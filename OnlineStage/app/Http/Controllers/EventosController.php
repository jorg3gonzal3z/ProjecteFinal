<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Events;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str;
use App\Models\InscritsEvents;
use RealRashid\SweetAlert\Facades\Alert;

class EventosController extends Controller
{
    public function index(){
        $users=User::all();
        $auth_user=Auth::user();
        $eventos=Events::orderBy('id','DESC')->paginate(10);
        $inscritos_eventos = InscritsEvents::all();
        if($auth_user){
            $inscripciones = InscritsEvents::where('id_usuari', $auth_user->id)->get();
            return view("eventos/index",compact(['auth_user','users','eventos','inscripciones','inscritos_eventos']));
        }else{
            return view("eventos/index",compact(['auth_user','users','eventos','inscritos_eventos']));
        }
        
    }

    public function store($id){

        $data = request()->validate([
            'logo' => 'required|mimes:jpeg,jpg,png',
            'Nombre' => 'required|max:40',
            'Tipo' => 'required|max:40',
            'n-Plazas' => 'required|numeric|min:15',
            'Localizacion' => 'required|max:60',
        ]);

        $foto = $data['logo'];
        $logo=$foto->store('public/' . $id);
        $url=Storage::url($logo);
        $url=Str::substr($url,1);

        $evento = Events::create([
            'logo' => $url,
            'nom' => $data['Nombre'],
            'tipus' => $data['Tipo'],
            'numPlaces' => $data['n-Plazas'],
            'localitzacio' => $data['Localizacion'],
            'id_usuari' => $id,
        ]);

        return redirect()->route('eventos.index');
    }

    public function update($id,$location){

        $evento = Events::find($id);

        $data = request()->validate([
            'old_logo' => 'required',
            'logo' => 'nullable|mimes:jpeg,jpg,png',
            'Nombre' => 'required|max:40',
            'Tipo' => 'required|max:40',
            'Localizacion' => 'required|max:60',
        ]);
        
        if(isset($data['logo'])){
            $foto = $data['logo'];
            $logo=$foto->store('public/' . $evento->id_usuari);
            $url=Storage::url($logo);
            $url=Str::substr($url,1);

            $evento->update([
                'logo' => $url,
                'nom' => $data['Nombre'],
                'tipus' => $data['Tipo'],
                'localitzacio' => $data['Localizacion'],
            ]);
        }else{
            $evento->update([
                'nom' => $data['Nombre'],
                'tipus' => $data['Tipo'],
                'localitzacio' => $data['Localizacion'],
            ]);
        }
        

        //depenent de des d'on es cridi al metode retornara una redireccio o una altra
        if($location == "eventos"){return redirect()->route('eventos.index');}
        elseif($location == "user"){return redirect()->route('user.index');}
    }

    public function destroy($id,$location){

        $evento = Events::find($id);

        $inscripciones = InscritsEvents::where('id_events', $id)->get();
        foreach ($inscripciones as $inscripcion){
            $inscripcion->delete();
        }

        $evento->delete();

        //depenent de des d'on es cridi al metode retornara una redireccio o una altra
        if($location == "eventos"){return redirect()->route('eventos.index');}
        elseif($location == "user"){return redirect()->route('user.index');}
    }

    public function signup($id_user, $id_event){

        $inscripcion = InscritsEvents::create([
            'id_usuari' => $id_user,
            'id_events' => $id_event,
        ]);

        $evento =  Events::find($id_event);
        $numPlaces = $evento->numPlaces;
        
        if($numPlaces >= 1){
            $evento->update([
                'numPlaces' => $numPlaces -1,
            ]);
        }else{
            return redirect()->route('eventos.index');
        }
        return redirect()->route('eventos.index');
    }

    public function quit($id_user, $id_event){

        $inscripciones = InscritsEvents::where('id_usuari', $id_user)->get();
        $evento =  Events::find($id_event);
        $numPlaces = $evento->numPlaces;

        foreach ($inscripciones as $inscripcion){
            if($inscripcion->id_events == $id_event){
                $evento->update([
                    'numPlaces' => $numPlaces +1,
                ]);
                $inscripcion->delete();
            }
        }
        return redirect()->route('eventos.index');
    }

    public function search(){
        $data= request()->validate([
            'search' => 'nullable',
        ]);
        $query=$data['search'];
        $eventos = Events::where('nom', 'like', '%'.$query.'%')->orderBy('nom','ASC')->paginate(10);
        $users=User::all();
        $auth_user=Auth::user();
        $inscritos_eventos = InscritsEvents::all();
        if($auth_user){

            if(count($eventos)>0){
                $busqueda = true;
                $inscripciones = InscritsEvents::where('id_usuari', $auth_user->id)->get();
                return view("eventos/index",compact(['busqueda','auth_user','users','eventos','inscripciones','inscritos_eventos']));
            }else{
                $inscripciones = InscritsEvents::where('id_usuari', $auth_user->id)->get();
                $vacio = true;
                return view("eventos/index",compact(['vacio','auth_user','users','eventos','inscripciones','inscritos_eventos']));
            }
            
        }else{

            if(count($eventos)>0){
                $busqueda = true;
                return view("eventos/index",compact(['busqueda','auth_user','users','eventos','inscritos_eventos']));
            }else{
                $vacio = true;
                return view("eventos/index",compact(['vacio','auth_user','users','eventos','inscritos_eventos']));
            }
        }
    }
}
