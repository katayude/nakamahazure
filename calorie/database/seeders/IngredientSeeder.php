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
            'name' => '米',
            'category_id' => '1',
            'calorie' => '360',
            'protein' => '6.7',
            'carbohydrate' => '77.5',
            'fat' => '0.6',
            'salt' => '0.0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('ingredients')->insert([
            'name' => 'パスタ',
            'category_id' => '1',
            'calorie' => '371',
            'protein' => '12.6',
            'carbohydrate' => '74.7',
            'fat' => '1.3',
            'salt' => '0.0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('ingredients')->insert([
            'name' => '卵',
            'category_id' => '5',
            'calorie' => '143',
            'protein' => '12.3',
            'carbohydrate' => '0.3',
            'fat' => '10.3',
            'salt' => '0.4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('ingredients')->insert([
            'name' => '牛肉',
            'category_id' => '4',
            'calorie' => '250',
            'protein' => '26.0',
            'carbohydrate' => '0.0',
            'fat' => '17.4',
            'salt' => '0.1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('ingredients')->insert([
            'name' => '玉ねぎ',
            'category_id' => '2',
            'calorie' => '40',
            'protein' => '0.2',
            'carbohydrate' => '9.3',
            'fat' => '0.2',
            'salt' => '0.0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('ingredients')->insert([
            'name' => '醤油',
            'category_id' => '1',
            'calorie' => '53',
            'protein' => '1.9',
            'carbohydrate' => '8.6',
            'fat' => '0.0',
            'salt' => '16.3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
