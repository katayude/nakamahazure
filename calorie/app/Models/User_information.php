<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_information extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'weight', 'gender', 'age', 'date'];
}
