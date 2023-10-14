<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ingredient1_id', 'ingredient2_id', 'ingredient3_id', 'ingredient4_id', 'ingredient5_id', 'calorie'];
}
