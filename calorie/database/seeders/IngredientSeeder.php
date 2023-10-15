<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingredients')->insert([
            'name' => 'ご飯',
            'category_id' => '1',
            'calorie' => '150',
            'protein' => '2.2',
            'carbohydrate' => '0.1',
            'fat' => '0.3',
            'solt' => '0.0'
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}



