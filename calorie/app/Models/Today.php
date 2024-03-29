<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Today extends Model
{
    use HasFactory;

    protected $table = 'todays';

    protected $fillable = ['user_id', 'food_id', 'date', 'calorie'];
}
