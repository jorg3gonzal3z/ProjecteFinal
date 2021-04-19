<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trams extends Model
{
    protected $table = 'trams';
    protected $fillable = ['nom','distancia','sortida','final','id_superficie','id_usuari'];
}
