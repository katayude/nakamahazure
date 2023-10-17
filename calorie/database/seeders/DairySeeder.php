<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DairySeeder extends Seeder
{
    public function run()
    {
    $dates = ['2023-10-17', '2023-10-18', '2023-10-21', '2023-10-22', '2023-10-23'];
    
    $trainings = [
        ['id' => 1, 'calorie' => 252],   // スクワット
        ['id' => 2, 'calorie' => 189],   // 腕立て伏せ
        ['id' => 3, 'calorie' => 283.5], // ランニング
        ['id' => 4, 'calorie' => 94.5],  // プランク
    ];

    for ($i = 0; $i < 10; $i++) {
        $selectedDate = $dates[array_rand($dates)];
        $selectedTraining = $trainings[array_rand($trainings)];

        DB::table('dairies')->insert([
            'user_id' => 1,
            'training_id' => $selectedTraining['id'],
            'date' => $selectedDate,
            'calorie' => $selectedTraining['calorie'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
}
