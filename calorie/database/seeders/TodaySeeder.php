<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('todays')->insert([
            'user_id' => 1,
            'food_id' => 6,  // 卵かけご飯のid
            'date' => '2023-10-17',
            'calorie' => round((200 / 100) * 140 + (60 / 100) * 70 + (10 / 100) * 53),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('todays')->insert([
            'user_id' => 2,
            'food_id' => 16,  // 冷奴のid
            'date' => '2023-10-18',
            'calorie' => round(55 + 5.3),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // user_id = 1のデータ
        DB::table('todays')->insert([
            ['user_id' => 1, 'food_id' => 6, 'date' => '2023-10-17', 'calorie' => round((200 / 100) * 140 + (60 / 100) * 70 + (10 / 100) * 53), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'food_id' => 9, 'date' => '2023-10-18', 'calorie' => round(210 + 35 + 165 + 5.3), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'food_id' => 13, 'date' => '2023-10-21', 'calorie' => round(18 + 58), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'food_id' => 6, 'date' => '2023-10-22', 'calorie' => round((200 / 100) * 140 + (60 / 100) * 70 + (10 / 100) * 53), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'food_id' => 9, 'date' => '2023-10-23', 'calorie' => round(210 + 35 + 165 + 5.3), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'food_id' => 13, 'date' => '2023-10-17', 'calorie' => round(18 + 58), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'food_id' => 8, 'date' => '2023-10-18', 'calorie' => round((200 / 100) * 140 + (60 / 100) * 70 + (10 / 100) * 53), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'food_id' => 12, 'date' => '2023-10-21', 'calorie' => round(210 + 35 + 165 + 5.3), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'food_id' => 11, 'date' => '2023-10-22', 'calorie' => round(18 + 58), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'food_id' => 9, 'date' => '2023-10-23', 'calorie' => round((200 / 100) * 140 + (60 / 100) * 70 + (10 / 100) * 53), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'food_id' => 8, 'date' => '2023-10-17', 'calorie' => round(210 + 35 + 165 + 5.3), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'food_id' => 7, 'date' => '2023-10-18', 'calorie' => round(18 + 58), 'created_at' => now(), 'updated_at' => now()],
        ]);

        // user_id = 2のデータ
        DB::table('todays')->insert([
            ['user_id' => 2, 'food_id' => 6, 'date' => '2023-10-17', 'calorie' => round(55 + 5.3), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'food_id' => 8, 'date' => '2023-10-18', 'calorie' => round(55 + 5.3), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'food_id' => 9, 'date' => '2023-10-21', 'calorie' => round(55 + 5.3), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'food_id' => 10, 'date' => '2023-10-22', 'calorie' => round(55 + 5.3), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'food_id' => 5, 'date' => '2023-10-23', 'calorie' => round(55 + 5.3), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
