<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscritsEvents extends Model
{
    protected $table = 'inscrits_events';
    protected $fillable = ['id_events','id_usuari'];
}
