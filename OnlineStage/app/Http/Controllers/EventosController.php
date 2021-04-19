<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Events;
use Illuminate\Support\Facades\Auth;

class EventosController extends Controller
{
    public function index(){
        $users=User::all();
        $auth_user=Auth::user();
        $eventos=Events::orderBy('id','DESC')->paginate(10);
        return view("eventos/index",compact(['auth_user','users','eventos']));
    } 
}
