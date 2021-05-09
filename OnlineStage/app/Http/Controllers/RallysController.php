<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rallys;
use App\Models\Fotos;
use App\Models\FotosRallys;
use Illuminate\Support\Facades\Auth;
use App\Models\Superficies;
use App\Models\User;
use App\Models\Categories;
use App\Models\CategoriesRallys;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str;
use App\Models\InscritsRallys;
use App\Models\Cotxes;

class RallysController extends Controller
{
    public function index(){
        $categorias = Categories::all();
        $categorias_rallys = CategoriesRallys::all();
        $rallys = Rallys::orderBy('id','DESC')->paginate(10);
        $fotos = Fotos::all();
        $fotos_rallys = FotosRallys::all();
        $superficies=Superficies::all();
        $users=User::all();
        $auth_user=Auth::user();
        $inscritos_rallys = InscritsRallys::all();
        if($auth_user){
            $inscripciones = InscritsRallys::where('id_usuari', $auth_user->id)->get();
            return view("rallys/index",compact(['rallys','fotos','fotos_rallys','superficies','users','auth_user','categorias','categorias_rallys','inscritos_rallys','inscripciones']));
        }else{
            return view("rallys/index",compact(['rallys','fotos','fotos_rallys','superficies','users','auth_user','categorias','categorias_rallys','inscritos_rallys']));
        }
    }

    public function store($id){

        $data = request()->validate([
            'fotos' => 'required',
            'fotos.*' => 'required|mimes:jpeg,jpg,png,gif',
            'nom' => 'required',
            'distancia' => 'required',
            'numTC' => 'required',
            'numAssistencies' => 'required',
            'localitzacio' => 'required',
            'numPlaces' => 'required',
            'id_superficie' => 'required',
            'categorias' => 'required',
            'categorias.*' => 'required',
        ]);

        $rally=Rallys::create([
            'nom' => $data['nom'],
            'distancia' => $data['distancia'],
            'numTC' => $data['numTC'],
            'numAssistencies' => $data['numAssistencies'],
            'localitzacio' => $data['localitzacio'],
            'numPlaces' => $data['numPlaces'],
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
            
            $foto_tramo=FotosRallys::create([
                'id_fotos' => $array_foto->id,
                'id_rallys' => $rally->id,
            ]);
        };

        $array_categorias = $data['categorias'];
        
        foreach($array_categorias as $array_categoria){
            
            $categoria_rally=CategoriesRallys::create([
                'id_categories' => $array_categoria,
                'id_rallys' => $rally->id,
            ]);

        };

        return redirect()->route('rallys.index');
    }

    public function update($id,$location){

        $rally=Rallys::find($id);

        $data = request()->validate([
            'fotos.*' => 'required|mimes:jpeg,jpg,png,gif',
            'nom' => 'required',
            'distancia' => 'required',
            'numTC' => 'required',
            'numAssistencies' => 'required',
            'localitzacio' => 'required',
            'numPlaces' => 'required',
            'id_superficie' => 'required',
            'categorias' => 'required',
            'categorias.*' => 'required',
        ]);

        $rally->update([
            'nom' => $data['nom'],
            'distancia' => $data['distancia'],
            'numTC' => $data['numTC'],
            'numAssistencies' => $data['numAssistencies'],
            'localitzacio' => $data['localitzacio'],
            'numPlaces' => $data['numPlaces'],
            'id_superficie' => $data['id_superficie'],
        ]);

        $categorias_rally = CategoriesRallys::where('id_rallys', $id)->get();
        foreach ($categorias_rally as $categoria_rally){
            $categoria_rally->delete();
        }

        $array_categorias = $data['categorias'];
        foreach($array_categorias as $array_categoria){
            
            $categoria_rally=CategoriesRallys::create([
                'id_categories' => $array_categoria,
                'id_rallys' => $rally->id,
            ]);

        };

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
                
                $foto_tramo=FotosRallys::create([
                    'id_fotos' => $array_foto->id,
                    'id_rallys' => $rally->id,
                ]);
            }
        }

        //depenent de des d'on es cridi al metode retornara una redireccio o una altra
        if($location == "rallys"){return redirect()->route('rallys.index');}
        elseif($location == "user"){return redirect()->route('user.index');}
    }

    public function destroy($id,$location){

        $rally=Rallys::find($id);

        $foto_rallys = FotosRallys::where('id_rallys', $id)->get();

        foreach ($foto_rallys as $foto_rally){
            $foto_rally->delete();
            //eliminar tambien la foto de la tabla fotos
            $fotos = Fotos::where('id', $foto_rally->id_fotos)->get();
            foreach($fotos as $foto){
                $foto->delete();
            }
        }

        $categorias_rally = CategoriesRallys::where('id_rallys', $id)->get();

        foreach ($categorias_rally as $categoria_rally){
            $categoria_rally->delete();
        }

        $inscripciones = InscritsRallys::where('id_rallys', $id)->get();
        foreach ($inscripciones as $inscripcion){
            $inscripcion->delete();
        }
        
        $rally->delete();

        //depenent de des d'on es cridi al metode retornara una redireccio o una altra
        if($location == "rallys"){return redirect()->route('rallys.index');}
        elseif($location == "user"){return redirect()->route('user.index');}
    }

    public function quit($id_user, $id_rally){

        $inscripciones = InscritsRallys::where('id_usuari', $id_user)->get();
        $rally =  Rallys::find($id_rally);
        $numPlaces = $rally->numPlaces;

        foreach ($inscripciones as $inscripcion){
            if($inscripcion->id_rallys == $id_rally){
                $rally->update([
                    'numPlaces' => $numPlaces +1,
                ]);
                $inscripcion->delete();
            }
        }
        return redirect()->route('rallys.index');
    }

    public function signup($id_user,$id_rally){
        $rally=Rallys::find($id_rally);
        $categorias_rally = CategoriesRallys::where('id_rallys', $id_rally)->get();
        $users=User::find($id_user);
        $coches=Cotxes::where('id_usuari', $id_user)->orderBy('id','DESC')->get();
        $auth_user=Auth::user();
        return view("rallys/signup",compact(['rally','users','coches','auth_user','categorias_rally']));
    }

    public function signup_car($id_user,$id_rally,$id_coche){
        $rally=Rallys::find($id_rally);
        $users=User::find($id_user);
        $coche=Cotxes::where('id', $id_coche);
        dd($coche);
    }
}
