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
use RealRashid\SweetAlert\Facades\Alert;

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
        $coches = Cotxes::all();
        if($auth_user){
            $inscripciones = InscritsRallys::where('id_usuari', $auth_user->id)->get();
            return view("rallys/index",compact(['rallys','fotos','fotos_rallys','superficies','users','auth_user','categorias','categorias_rallys','inscritos_rallys','inscripciones', 'coches']));
        }else{
            return view("rallys/index",compact(['rallys','fotos','fotos_rallys','superficies','users','auth_user','categorias','categorias_rallys','inscritos_rallys', 'coches']));
        }
    }

    public function store($id){

        $data = request()->validate([
            'fotos' => 'required',
            'fotos.*' => 'required|mimes:jpeg,jpg,png',
            'nom' => 'required|max:40',
            'distancia' => 'required|numeric|min:30',
            'numTC' => 'required|numeric|min:3',
            'numAssistencies' => 'required|numeric|min:2',
            'localitzacio' => 'required|max:60',
            'numPlaces' => 'required|numeric|min:50',
            'id_superficie' => 'required|numeric',
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

            $foto=$array_foto->store('public/' . $id);
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
            'fotos.*' => 'required|mimes:jpeg,jpg,png',
            'nom' => 'required|max:40',
            'distancia' => 'required|numeric|min:30',
            'numTC' => 'required|numeric|min:3',
            'numAssistencies' => 'required|numeric|min:2',
            'localitzacio' => 'required|max:60',
            'id_superficie' => 'required|numeric',
        ]);

        $rally->update([
            'nom' => $data['nom'],
            'distancia' => $data['distancia'],
            'numTC' => $data['numTC'],
            'numAssistencies' => $data['numAssistencies'],
            'localitzacio' => $data['localitzacio'],
            'id_superficie' => $data['id_superficie'],
        ]);

        $array_fotos = request('fotos');
        $all_fotos_rally=FotosRallys::where('id_rallys', $rally->id)->count();

        //si hi ha alguna imatge nova per afegir
        if (gettype($array_fotos) == "array"){
            $imgConditional = count($array_fotos) + $all_fotos_rally;
            if($imgConditional <= 6){
                foreach($array_fotos as $array_foto){
                    $foto=$array_foto->store('public/' . $rally->id_usuari);
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
            }else{
                Alert::error('Oops...', 'No se pueden añadir mas de 6 fotos');
            }
        }

        //eliminar las imagenes al editar el rally si se eliminan del formulario
        $eliminarString = request('imagenes_a_eliminar');
        $imagenes_a_eliminar = array_map("intval", explode(",", $eliminarString));

        if ($imagenes_a_eliminar != ["null"] && count($imagenes_a_eliminar) < $all_fotos_rally) {
            foreach ($imagenes_a_eliminar as $imagen_a_eliminar){

                $foto_rally = FotosRallys::where('id_fotos', $imagen_a_eliminar);

                $foto_rally->delete();
                $foto = Fotos::where('id', $imagen_a_eliminar);
                $foto->delete();
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
        
        $possibles_coches = [];

        foreach ($categorias_rally as $categoria_rally){  
            foreach ($coches as $coche){
                if ($coche->id_categoria == $categoria_rally->id_categories){                       
                    array_push($possibles_coches, $coche);              
                }
            }
        }                         
        
        return view("rallys/signup",compact(['rally','users','coches','auth_user','categorias_rally','possibles_coches']));
    }

    public function signup_car($id_user,$id_rally,$id_coche){
        
        $rally=Rallys::find($id_rally);
        $users=User::find($id_user);
        $coche=Cotxes::where('id', $id_coche);
        
        $numPlaces = $rally->numPlaces;
        
        if($numPlaces >= 1){
            $rally->update([
                'numPlaces' => $numPlaces -1,
            ]);
            $inscripcion = InscritsRallys::create([
                'id_usuari' => $id_user,
                'id_rallys' => $id_rally,
                'id_cotxe' => $id_coche,
            ]);
        }else{
            return redirect()->route('rallys.index');
        }

        return response()->json([
            'success' => 'yes',
        ]);
        
    }

    public function search(){
        $data= request()->validate([
            'search' => 'nullable',
        ]);
        $query=$data['search'];
        $rallys = Rallys::where('nom', 'like', '%'.$query.'%')->orderBy('nom','ASC')->paginate(10);
        $categorias = Categories::all();
        $categorias_rallys = CategoriesRallys::all();
        $fotos = Fotos::all();
        $fotos_rallys = FotosRallys::all();
        $superficies=Superficies::all();
        $users=User::all();
        $auth_user=Auth::user();
        $inscritos_rallys = InscritsRallys::all();
        $coches = Cotxes::all();
        if($auth_user){

            if (count($rallys) > 0){
                $busqueda = true;
                $inscripciones = InscritsRallys::where('id_usuari', $auth_user->id)->get();
                return view("rallys/index",compact(['busqueda','rallys','fotos','fotos_rallys','superficies','users','auth_user','categorias','categorias_rallys','inscritos_rallys','inscripciones', 'coches']));
            }else{
                $inscripciones = InscritsRallys::where('id_usuari', $auth_user->id)->get();
                $vacio = true;
                return view("rallys/index",compact(['vacio','rallys','fotos','fotos_rallys','superficies','users','auth_user','categorias','categorias_rallys','inscritos_rallys','inscripciones', 'coches']));
            }
            
        }else{

            if (count($rallys) > 0){
                $busqueda = true;
                return view("rallys/index",compact(['busqueda','rallys','fotos','fotos_rallys','superficies','users','auth_user','categorias','categorias_rallys','inscritos_rallys', 'coches']));
            }else{
                $vacio = true;
                return view("rallys/index",compact(['vacio','rallys','fotos','fotos_rallys','superficies','users','auth_user','categorias','categorias_rallys','inscritos_rallys', 'coches']));
            }
        }
    }
}
