<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotxes extends Model
{
    protected $table = 'cotxes';
    protected $fillable = ['model','potencia','trenMotriu','pes','any','id_categoria','id_usuari'];
}
