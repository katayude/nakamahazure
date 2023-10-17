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
            'ingredient1_id' => '1',  // 米
            'ingredient1_weight' => '200', // 200gとして
            'ingredient2_id' => '3',  // 卵
            'ingredient2_weight' => '60',  // 通常の卵の重さは約60g
            'ingredient3_id' => '7',  // 醤油
            'ingredient3_weight' => '10',  // 10gとして
            'ingredient4_id' => null,
            'ingredient4_weight' => '0',
            'ingredient5_id' => null,
            'ingredient5_weight' => '0',
            'calorie' => (200/100)*140 + (60/100)*70 + (10/100)*53,  // 上記食材のカロリーを元に算出
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 親子丼
        DB::table('food')->insert([
            'name' => '親子丼',
            'ingredient1_id' => '1',       // 米
            'ingredient1_weight' => '150', // 150g
            'ingredient2_id' => '3',      // 卵
            'ingredient2_weight' => '50', // 50g (約1個分)
            'ingredient3_id' => '8',      // 鶏肉
            'ingredient3_weight' => '100', // 100g
            'ingredient4_id' => '7',      // 醤油
            'ingredient4_weight' => '10', // 10g
            'ingredient5_id' => null,
            'ingredient5_weight' => '0',
            'calorie' => round(210 + 35 + 165 + 5.3),  // 計算結果
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ツナサラダ
        DB::table('food')->insert([
            'name' => 'ツナサラダ',
            'ingredient1_id' => '10',       // トマト
            'ingredient1_weight' => '100',  // 100g
            'ingredient2_id' => '9',       // ツナ
            'ingredient2_weight' => '50',   // 50g
            'ingredient3_id' => null,      // ここでキャベツの情報は提供されていないのでnullと0を入れます。
            'ingredient3_weight' => '0',
            'ingredient4_id' => null,
            'ingredient4_weight' => '0',
            'ingredient5_id' => null,
            'ingredient5_weight' => '0',
            'calorie' => round(18 + 58), // 計算結果
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 冷奴
        DB::table('food')->insert([
            'name' => '冷奴',
            'ingredient1_id' => '16',      // 豆腐
            'ingredient1_weight' => '100', // 100g
            'ingredient2_id' => '7',      // 醤油
            'ingredient2_weight' => '10',  // 10g
            'ingredient3_id' => null,
            'ingredient3_weight' => '0',
            'ingredient4_id' => null,
            'ingredient4_weight' => '0',
            'ingredient5_id' => null,
            'ingredient5_weight' => '0',
            'calorie' => round(55 + 5.3), // 計算結果
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
