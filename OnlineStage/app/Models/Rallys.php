<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rallys extends Model
{
    protected $table = 'rallys';
    protected $fillable = ['nom','logo','distancia','numTC','numAssistencies','localitzacio','numPlaces','id_superficie','id_usuari'];
}
