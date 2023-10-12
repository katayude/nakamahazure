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
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '卵',
            'category_id' => '5',
            'calorie' => '150',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '醤油',
            'category_id' => '6',
            'calorie' => '50',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'パスタ',
            'category_id' => '1',
            'calorie' => '300',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'オリーブオイル',
            'category_id' => '6',
            'calorie' => '900',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'にんにく',
            'category_id' => '6',
            'calorie' => '130',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
