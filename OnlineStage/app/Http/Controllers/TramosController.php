<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trams;
use App\Models\Superficies;
use App\Models\User;
use App\Models\Fotos;
use App\Models\FotosTrams;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str;

class TramosController extends Controller
{
    public function index(){
        $tramos=Trams::orderBy('id','DESC')->paginate(10);
        $superficies=Superficies::all();
        $users=User::all();
        $auth_user=Auth::user();
        $fotos=Fotos::all();
        $fotos_tramos=FotosTrams::all();
        return view("tramos/index",compact(['tramos','superficies','users','auth_user','fotos','fotos_tramos']));
    }

    public function store($id){
       
        $data = request()->validate([
            'fotos' => 'required',
            'fotos.*' => 'required|mimes:jpeg,jpg,png,gif',
            'nom' => 'required',
            'distancia' => 'required',
            'sortida' => 'required',
            'final' => 'required',
            'adressa' => 'required',
            'id_superficie' => 'required',
        ]);
       
        $tramo=Trams::create([
            'nom' => $data['nom'],
            'distancia' => $data['distancia'],
            'sortida' => $data['sortida'],
            'final' => $data['final'],
            'adressa' => $data['adressa'],
            'id_superficie' => $data['id_superficie'],
            'id_usuari' => $id,
        ]);

        $array_fotos = $data['fotos'];
        
        foreach($array_fotos as $array_foto){

            $foto=$array_foto->store('public');
            $url=Storage::url($foto);
            $url=Str::substr($url,1);
            $array_foto=Fotos::create([
                'binari' => $url,
            ]);
            
            $foto_tramo=FotosTrams::create([
                'id_fotos' => $array_foto->id,
                'id_trams' => $tramo->id,
            ]);
        }

        return redirect()->route('tramos.index');
    }

    public function update($id,$location){
        
        $tramo = Trams::find($id);

        $data = request()->validate([
            'fotos.*' => 'mimes:jpeg,jpg,png,gif',
            'nom' => 'required',
            'distancia' => 'required',
            'sortida' => 'required',
            'final' => 'required',
            'adressa' => 'required',
            'id_superficie' => 'required',
        ]);

        $tramo->update([
            'nom' => $data['nom'],
            'distancia' => $data['distancia'],
            'sortida' => $data['sortida'],
            'final' => $data['final'],
            'adressa' => $data['adressa'],
            'id_superficie' => $data['id_superficie']
        ]);
        
        $array_fotos = request('fotos');
        
        //si hi ha alguna imatge nova per afegir
        if (gettype($array_fotos) == "array"){
            foreach($array_fotos as $array_foto){
                $foto=$array_foto->store('public');
                $url=Storage::url($foto);
                $url=Str::substr($url,1);
                $array_foto=Fotos::create([
                    'binari' => $url,
                ]);
                
                $foto_tramo=FotosTrams::create([
                    'id_fotos' => $array_foto->id,
                    'id_trams' => $tramo->id,
                ]);
            }
        }

        //eliminar las imagenes al editar el tramo
        $imagenes_a_eliminar = request('imagenes_a_eliminar');

        if ($imagenes_a_eliminar != ["null"]) {
            foreach ($imagenes_a_eliminar as $imagen_a_eliminar){
                $foto_tramo = FotosTrams::where('id_fotos', $imagen_a_eliminar);
                $foto_tramo->delete();
                $foto = Fotos::where('id', $imagen_a_eliminar);
                $foto->delete();
            }
        }
        

        //depenent de des d'on es cridi al metode retornara una redireccio o una altra
        if($location == "tramos"){return redirect()->route('tramos.index');}
        elseif($location == "user"){return redirect()->route('user.index');}
    }

    public function destroy($id,$location){
        $tramo = Trams::find($id);
        $foto_tramos = FotosTrams::where('id_trams', $id)->get();
        foreach ($foto_tramos as $foto_tramo){
            $foto_tramo->delete();
            //eliminar tambien la foto de la tabla fotos
            $fotos = Fotos::where('id', $foto_tramo->id_fotos)->get();
            foreach($fotos as $foto){
                $foto->delete();
            }
        }
        $tramo->delete();
        //depenent de des d'on es cridi al metode retornara una redireccio o una altra
        if($location == "tramos"){return redirect()->route('tramos.index');}
        elseif($location == "user"){return redirect()->route('user.index');}
    }

}
