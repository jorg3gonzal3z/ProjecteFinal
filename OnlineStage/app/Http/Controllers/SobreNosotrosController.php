<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosotrosController extends Controller
{
    public function index(){
        return view("sobre_nosotros/index");
    }
}
