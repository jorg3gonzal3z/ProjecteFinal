<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosTrams extends Model
{
    protected $table = 'fotos_trams';
    protected $fillable = ['id_fotos','id_trams'];
}
