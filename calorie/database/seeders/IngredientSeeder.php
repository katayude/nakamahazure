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
            'name' => '',
            'category_id' => '',
            'calorie' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '',
            'category_id' => '',
            'calorie' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '',
            'category_id' => '',
            'calorie' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '',
            'category_id' => '',
            'calorie' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '',
            'category_id' => '',
            'calorie' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '',
            'category_id' => '',
            'calorie' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
