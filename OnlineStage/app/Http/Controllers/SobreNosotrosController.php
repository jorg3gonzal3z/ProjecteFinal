<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosotrosController extends Controller
{
    public function index(){
        $informacio = ([
            "nom_empresa" => "TC-1 Online Rallys",
            "adreca_1" => "Av. de Vilafranca del Penedès",
            "zip_cp" => "08800",
            "ciutat" => "Vilanova y la Geltru",
            "provincia" => "El Garraf",
        ]);
        return view("sobre_nosotros/index",compact(['informacio']));
    }
}
