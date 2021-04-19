<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscritsRallys extends Model
{
    protected $table = 'inscrits_rallys';
    protected $fillable = ['id_rallys','id_usuari'];
}
