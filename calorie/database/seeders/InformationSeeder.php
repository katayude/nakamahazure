<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformationSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 60,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-17',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
