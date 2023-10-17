<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingSeeder extends Seeder
{
    public function run()
    {
        DB::table('trainings')->insert([
            'user_id' => 1,
            'name' => 'スクワット',
            'calorie' => 8,  // スクワットのMETs値
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trainings')->insert([
            'user_id' => 1,
            'name' => '腕立て伏せ',
            'calorie' => 6,  // 腕立て伏せのMETs値
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trainings')->insert([
            'user_id' => 1,
            'name' => 'ランニング',
            'calorie' => 9,  // ランニングのMETs値
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trainings')->insert([
            'user_id' => 1,
            'name' => 'プランク',
            'calorie' => 3,  // プランクのMETs値
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
