<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('food')->insert([
            'name' => '卵かけご飯',
            'ingredient1_id' => '1',
            'ingredient2_id' => '2',
            'ingredient3_id' => '3',
            'ingredient4_id' => Null,
            'ingredient5_id' => Null,
            'calorie' => '350',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('food')->insert([
            'name' => 'ペペロンチーノ',
            'ingredient1_id' => '4',
            'ingredient2_id' => '5',
            'ingredient3_id' => '6',
            'ingredient4_id' => Null,
            'ingredient5_id' => Null,
            'calorie' => '500',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
