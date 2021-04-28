<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cotxes;
use App\Models\Categories;
use App\Models\Fotos;
use App\Models\FotosCotxes;
use App\Models\FotosTrams;
use App\Models\Trams;
use App\Models\Superficies;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index(){
        $auth_user=Auth::user();
        $coches=Cotxes::all();
        $categorias=Categories::all();
        $fotos=Fotos::all();
        $fotos_coches=FotosCotxes::all();
        $fotos_tramos=FotosTrams::all();
        $superficies=Superficies::all();
        $tramos=Trams::where('id_usuari', $auth_user->id)->get();
        return view("user/index",compact(['auth_user','coches','categorias','fotos','fotos_coches','fotos_tramos','tramos','superficies']));
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

            $foto=$array_foto->store('public');
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
}
