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
            'calorie' => '140',       // 100gの白米当たりの一般的なカロリー
            'protein' => '2.6',      // 100gの白米当たりの一般的なタンパク質量
            'carbohydrate' => '31',  // 100gの白米当たりの一般的な炭水化物量
            'fat' => '0.3',          // 100gの白米当たりの一般的な脂質量
            'solt' => '0.0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'パスタ',
            'category_id' => '1',
            'calorie' => '157',       // 100gの茹でたパスタ当たりの一般的なカロリー
            'protein' => '5.8',       // 100gの茹でたパスタ当たりの一般的なタンパク質量
            'carbohydrate' => '30.9', // 100gの茹でたパスタ当たりの一般的な炭水化物量
            'fat' => '1.0',           // 100gの茹でたパスタ当たりの一般的な脂質量
            'solt' => '0.0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '卵',
            'category_id' => '5',
            'calorie' => '70',       // 生の卵1個当たりの一般的なカロリー
            'protein' => '6.3',      // 生の卵1個当たりの一般的なタンパク質量
            'carbohydrate' => '0.4', // 生の卵1個当たりの一般的な炭水化物量
            'fat' => '5.0',          // 生の卵1個当たりの一般的な脂質量
            'solt' => '0.2',         // 生の卵1個当たりの一般的な塩分量
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
            'solt' => '0.1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '豚肉',
            'category_id' => '4',
            'calorie' => '242',  // この数値は一般的な豚肉の平均カロリーを参考にしています。
            'protein' => '16.0',  // タンパク質の一般的な量
            'carbohydrate' => '0.0',  // ほとんどの肉には炭水化物は含まれていません。
            'fat' => '19.6',  // 脂質の一般的な量
            'solt' => '0.1',  // これは推定される値であり、実際の値は加工方法などによって異なる可能性があります。
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
            'solt' => '0.0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('ingredients')->insert([
            'name' => '醤油',
            'category_id' => '6',
            'calorie' => '53',
            'protein' => '1.9',
            'carbohydrate' => '8.6',
            'fat' => '0.0',
            'solt' => '16.3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '鶏肉',
            'category_id' => '4',
            'calorie' => '165',  // この数値は一般的な鶏むね肉の平均カロリーを参考にしています。
            'protein' => '31.0',  // タンパク質の一般的な量
            'carbohydrate' => '0.0',  // ほとんどの肉には炭水化物は含まれていません。
            'fat' => '3.6',  // 脂質の一般的な量
            'solt' => '0.1',  // これは推定される値であり、実際の値は加工方法などによって異なる可能性があります。
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'ツナ',
            'category_id' => '3',
            'calorie' => '116',
            'protein' => '27.3',
            'carbohydrate' => '0.0',
            'fat' => '1.3',
            'solt' => '0.5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'トマト',
            'category_id' => '2',
            'calorie' => '18',
            'protein' => '0.9',
            'carbohydrate' => '3.9',
            'fat' => '0.2',
            'solt' => '0.0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'レタス',
            'category_id' => '2',
            'calorie' => '15',
            'protein' => '1.4',
            'carbohydrate' => '2.9',
            'fat' => '0.3',
            'solt' => '0.0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'マヨネーズ',
            'category_id' => '6',
            'calorie' => '680',
            'protein' => '0.9',
            'carbohydrate' => '2.3',
            'fat' => '75.0',
            'solt' => '1.2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'パン',
            'category_id' => '1',
            'calorie' => '265',
            'protein' => '8.1',
            'carbohydrate' => '48.8',
            'fat' => '3.0',
            'solt' => '1.1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '味噌',
            'category_id' => '6',
            'calorie' => '211',
            'protein' => '11.7',
            'carbohydrate' => '26.5',
            'fat' => '6.8',
            'solt' => '12.3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => 'じゃがいも',
            'category_id' => '2',
            'calorie' => '74',
            'protein' => '2.0',
            'carbohydrate' => '17.5',
            'fat' => '0.1',
            'solt' => '0.0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('ingredients')->insert([
            'name' => '豆腐',
            'category_id' => '5',
            'calorie' => '55',
            'protein' => '5.2',
            'carbohydrate' => '2.0',
            'fat' => '2.8',
            'solt' => '0.0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}