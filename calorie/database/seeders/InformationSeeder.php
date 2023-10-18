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
            'weight' => 65,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-12',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 64,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-13',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 64,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-14',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 62,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 65,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-16',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 66,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-17',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 65,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-18',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 63,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-19',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 61,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-20',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 62,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-21',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 61,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-22',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
