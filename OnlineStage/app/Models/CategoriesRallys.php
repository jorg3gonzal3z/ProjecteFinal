<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesRallys extends Model
{
    protected $table = 'categories_rallys';
    protected $fillable = ['id_categories','id_rallys'];
}
