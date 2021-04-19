<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosRallys extends Model
{
    protected $table = 'fotos_rallys';
    protected $fillable = ['id_fotos','id_rallys'];
}
