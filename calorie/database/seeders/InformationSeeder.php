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
            'height'=> '170',
            'birthday'=> '2013-10-11',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 64,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-13',
            'birthday'=> '2013-10-11',
            'height'=> '170',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 64,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-14',
            'birthday'=> '2013-10-11',
            'height'=> '170',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 62,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-15',
            'birthday'=> '2013-10-11',
            'height'=> '170',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 65,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-16',
            'birthday'=> '2013-10-11',
            'height'=> '170',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 66,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-17',
            'birthday'=> '2013-10-11',
            'height'=> '170',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 65,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-18',
            'birthday'=> '2013-10-11',
            'height'=> '170',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 63,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-19',
            'birthday'=> '2013-10-11',
            'height'=> '170',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 61,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-20',
            'birthday'=> '2013-10-11',
            'height'=> '170',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 62,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-21',
            'birthday'=> '2013-10-11',
            'height'=> '170',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_informations')->insert([
            'user_id' => 1,
            'weight' => 61,
            'gender' => '男',  
            'age'=> 10,
            'date'=> '2023-10-22',
            'birthday'=> '2013-10-11',
            'height'=> '170',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
