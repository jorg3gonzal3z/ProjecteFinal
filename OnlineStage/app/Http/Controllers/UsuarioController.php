<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cotxes;
use App\Models\Categories;
use App\Models\CategoriesRallys;
use App\Models\Fotos;
use App\Models\FotosCotxes;
use App\Models\FotosTrams;
use App\Models\Trams;
use App\Models\Superficies;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Events;
use App\Models\Rallys;
use App\Models\FotosRallys;
use App\Models\InscritsRallys;
use App\Models\InscritsEvents;

class UsuarioController extends Controller
{
    public function index(){
        $auth_user=Auth::user();
        $coches=Cotxes::orderBy('id','DESC')->get();
        $categorias=Categories::all();
        $fotos=Fotos::all();
        $fotos_coches=FotosCotxes::all();
        $fotos_tramos=FotosTrams::all();
        $superficies=Superficies::all();
        $fotos_rallys = FotosRallys::all();
        $categorias_rallys = CategoriesRallys::all();
        $tramos=Trams::where('id_usuari', $auth_user->id)->orderBy('id','DESC')->get();
        $eventos=Events::where('id_usuari', $auth_user->id)->orderBy('id','DESC')->get();
        $rallys=Rallys::where('id_usuari', $auth_user->id)->orderBy('id','DESC')->get();
        $inscripciones_rallys = InscritsRallys::where('id_usuari', $auth_user->id)->get();
        $inscripciones_eventos = InscritsEvents::where('id_usuari', $auth_user->id)->get();
        return view("user/index",compact(['auth_user','coches','categorias','fotos','fotos_coches','fotos_tramos','tramos','superficies','eventos','rallys','fotos_rallys','categorias_rallys','inscripciones_rallys','inscripciones_eventos']));
    }

    public function add_car($id){
        $data = request()->validate([
            'fotos' => 'required',
            'fotos.*' => 'required|mimes:jpeg,jpg,png,gif',
            'modelo' => 'required',
            'potencia' => 'required|numeric',
            'peso' => 'required|numeric',
            'año' => 'required|numeric',
            'tren_motriz' => 'required',
            'id_categoria' => 'required',
        ]);

        $coche=Cotxes::create([
            'model' => $data['modelo'],
            'potencia' => $data['potencia'],
            'trenMotriu' => $data['tren_motriz'],
            'pes' => $data['peso'],
            'any' => $data['año'],
            'id_categoria' => $data['id_categoria'],
            'id_usuari' => $id
        ]);

        $array_fotos = $data['fotos'];
        
        foreach($array_fotos as $array_foto){

            $foto=$array_foto->store('public/'.$id);
            $url=Storage::url($foto);
            $url=Str::substr($url,1);
            $array_foto=Fotos::create([
                'binari' => $url,
            ]);
            
            $foto_coche=FotosCotxes::create([
                'id_fotos' => $array_foto->id,
                'id_cotxes' => $coche->id,
            ]);
        }

        return redirect()->route('user.index');
    }

    public function update($id){

        $user = User::find($id);

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'pass' => 'nullable|min:8',
            'rpass' => 'exclude_if:pass,null|required|same:pass|min:8',
        ]);

        if ($data['pass'] != null){
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['pass']),
            ]);
        }else{
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
        }
        
        return redirect()->route('user.index');
    }

    public function destroy_car($id){
        $coche=Cotxes::find($id);
        $foto_coches = FotosCotxes::where('id_cotxes', $id)->get();
        foreach ($foto_coches as $foto_coche){
            $foto_coche->delete();
            //eliminar tambien la foto de la tabla fotos
            $fotos = Fotos::where('id', $foto_coche->id_fotos)->get();
            foreach($fotos as $foto){
                $foto->delete();
            }
        }
        $coche->delete();
        return redirect()->route('user.index');
    }

    public function update_car($id){
        $coche=Cotxes::find($id);
        $data = request()->validate([
            'fotos.*' => 'mimes:jpeg,jpg,png,gif',
            'modelo' => 'required',
            'potencia' => 'required|numeric',
            'peso' => 'required|numeric',
            'año' => 'required|numeric',
            'tren_motriz' => 'required',
            'id_categoria' => 'required',
        ]);
        $coche->update([
            'model' => $data['modelo'],
            'potencia' => $data['potencia'],
            'trenMotriu' => $data['tren_motriz'],
            'pes' => $data['peso'],
            'any' => $data['año'],
            'id_categoria' => $data['id_categoria'],
        ]);

        $array_fotos = request('fotos');
        
        //si hi ha alguna imatge nova per afegir
        if (gettype($array_fotos) == "array"){
            foreach($array_fotos as $array_foto){
                $foto=$array_foto->store('public/'.$coche->id_usuari);
                $url=Storage::url($foto);
                $url=Str::substr($url,1);
                $array_foto=Fotos::create([
                    'binari' => $url,
                ]);
                
                $foto_tramo=FotosCotxes::create([
                    'id_fotos' => $array_foto->id,
                    'id_cotxes' => $coche->id,
                ]);
            }
        }
        return redirect()->route('user.index');

    }

    public function getCat(){
        $categorias=Categories::all();
        // return $categorias;
        return response()->json($categorias);
    }

    public function destroyUser($id){
        $user = User::find($id);

        $coches_user = Cotxes::where('id_usuari', $id)->get();
        foreach ($coches_user as $coche_user){
            $fotos_coche_user = FotosCotxes::where('id_cotxes', $coche_user->id)->get();
            foreach ($fotos_coche_user as $foto_coche_user){
                $foto = Fotos::where('id', $foto_coche_user->id_fotos)->get();
                $foto_coche_user->delete();
                $foto->delete();
            }
            $coches_user->delete();
        }
        
        $eventos_user = Events::where('id_usuari', $id)->get();
        foreach ($eventos_user as $evento_user){
            $evento_user->delete();
        }

        $inscripciones_eventos = InscritsEvents::where('id_usuari', $id)->get();
        foreach ( $inscripciones_eventos as $inscripcion_evento){
            $inscripcion_evento->delete();
        }

        $inscripciones_rallys = InscritsRallys::where('id_usuari', $id)->get();
        foreach ($inscripciones_rallys as $inscripcion_rally){
            $inscripcion_rally->delete();
        }

        $tramos = Trams::where('id_usuari', $id)->get();
        foreach ($tramos as $tramo){
            $fotos_tramo = FotosTrams::where('id_trams', $tramo->id)->get();
            foreach ($fotos_tramo as $foto_tramo){
                $foto = Fotos::where('id', $foto_tramo->id_fotos)->get();
                $foto_tramo->delete();
                $foto->delete();
            }
            $tramo->delete();
        }

        $rallys = Rallys::where('id_usuari', $id)->get();
        foreach ($rallys as $rally){
            $fotos_rally = FotosRallys::where('id_rallys', $rally->id)->get();
            foreach ($fotos_rally as $foto_rally){
                $foto = Fotos::where('id', $foto_rally->id_fotos)->get();
                $foto_rally->delete();
                $foto->delete();
            }
            $rally->delete();
        }

        $user->delete();
    }
}
