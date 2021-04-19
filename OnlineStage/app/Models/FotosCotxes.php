<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosCotxes extends Model
{
    protected $table = 'fotos_cotxes';
    protected $fillable = ['id_fotos','id_cotxes'];
}
