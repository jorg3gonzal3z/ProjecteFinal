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
use RealRashid\SweetAlert\Facades\Alert;

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
            'fotos.*' => 'required|mimes:jpeg,jpg,png',
            'Nombre' => 'required|max:40',
            'Distancia' => 'required|numeric|min:5',
            'Salida' => 'required',
            'Final' => 'required',
            'Trayecto' => 'required',
            'Superficie' => 'required|numeric',
        ]);
       
        $tramo=Trams::create([
            'nom' => $data['Nombre'],
            'distancia' => $data['Distancia'],
            'sortida' => $data['Salida'],
            'final' => $data['Final'],
            'adressa' => $data['Trayecto'],
            'id_superficie' => $data['Superficie'],
            'id_usuari' => $id,
        ]);

        $array_fotos = $data['fotos'];
        
        foreach($array_fotos as $array_foto){            
            $foto=$array_foto->store('public/' . $id);
    
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
            'fotos.*' => 'mimes:jpeg,jpg,png',
            'Nombre' => 'required|max:40',
            'Distancia' => 'required|numeric|min:5',
            'Superficie' => 'required|numeric',
        ]);

        $tramo->update([
            'nom' => $data['Nombre'],
            'distancia' => $data['Distancia'],
            'id_superficie' => $data['Superficie']
        ]);
        
        $array_fotos = request('fotos');
        $all_fotos_tramo=FotosTrams::where('id_trams', $tramo->id)->count();

        //si hi ha alguna imatge nova per afegir
        if (gettype($array_fotos) == "array"){
            $imgConditional = count($array_fotos) + $all_fotos_tramo;
            if($imgConditional <= 6){
                foreach($array_fotos as $array_foto){
                    $foto=$array_foto->store('public/'. $tramo->id_usuari);
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
            }else{
                Alert::error('Oops...', 'No se pueden añadir mas de 6 fotos');
            }
        }

        //eliminar las imagenes al editar el tramo si se eliminan del formulario
        $eliminarString = request('imagenes_a_eliminar');
        $imagenes_a_eliminar = array_map("intval", explode(",", $eliminarString));

        if ($imagenes_a_eliminar != ["null"] && count($imagenes_a_eliminar) < $all_fotos_tramo) {
            foreach ($imagenes_a_eliminar as $imagen_a_eliminar){

                $foto_tramo = FotosTrams::where('id_fotos', $imagen_a_eliminar);

                $foto_tramo->delete();
                $foto = Fotos::where('id', $imagen_a_eliminar);
                $foto->delete();
            }
        }else{
            Alert::error('Oops...', 'No se pueden eliminar todas las fotos');
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

    public function search(){
        $data= request()->validate([
            'search' => 'nullable',
        ]);
        $query=$data['search'];
        $tramos = Trams::where('nom', 'like', '%'.$query.'%')->orderBy('nom','ASC')->paginate(10);        
        $superficies=Superficies::all();
        $users=User::all();
        $auth_user=Auth::user();
        $fotos=Fotos::all();
        $fotos_tramos=FotosTrams::all();
        if(count($tramos) > 0){
            $busqueda = true;
            return view("tramos/index",compact(['busqueda','tramos','superficies','users','auth_user','fotos','fotos_tramos']));

        }else{
            
            $vacio = true;
            return view("tramos/index",compact(['vacio','tramos','superficies','users','auth_user','fotos','fotos_tramos']));
        }
    }

}
