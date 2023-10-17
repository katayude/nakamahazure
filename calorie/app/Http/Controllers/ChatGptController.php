<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Food;
use App\Models\Today;
use App\Models\Ingredient;
use App\Models\Nutritions;
use App\Models\User_information;

class ChatGptController extends Controller

{

    public function index(Request $request)
    {
        // ログインしているユーザを取得
        $user = auth()->user();
        $user_information = User_information::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $date = date('Y-m-d');

        // 指定された日付に食べた料理を取得
        $todayMeals = Today::where('date', $date)
            ->where('user_id', $user->id)
            ->get();

        $foodIds = $todayMeals->pluck('food_id')->toArray();
        $todayFood = Food::whereIn('id', $foodIds)->get();


        $totalNutrition = [
            'total_protein' => 0,
            'total_fat' => 0,
            'total_carbohydrate' => 0,
            'total_solt' => 0,
            'total_calorie' => 0
        ];

        foreach ($todayMeals as $todayMeal) {
            $food = Food::find($todayMeal->food_id);
            $ingredientIds = [$food->ingredient1_id, $food->ingredient2_id, $food->ingredient3_id, $food->ingredient4_id, $food->ingredient5_id];
            $mealNutrition = Ingredient::whereIn('id', $ingredientIds)
                ->selectRaw('SUM(protein) as total_protein, SUM(fat) as total_fat, SUM(carbohydrate) as total_carbohydrate, SUM(solt) as total_solt')
                ->first();

            // 各栄養素を合算
            $totalNutrition['total_protein'] += $mealNutrition->total_protein;
            $totalNutrition['total_fat'] += $mealNutrition->total_fat;
            $totalNutrition['total_carbohydrate'] += $mealNutrition->total_carbohydrate;
            $totalNutrition['total_solt'] += $mealNutrition->total_solt;
            $totalNutrition['total_calorie'] += $food->calorie;
        }
        $protein = $totalNutrition['total_protein'];
        $fat = $totalNutrition['total_fat'];
        $carbohydrate = $totalNutrition['total_carbohydrate'];
        $calorie = $totalNutrition['total_calorie'];

        $chat = "今日は何を食べたかな？";


        return view('chat', compact('chat', 'protein', 'fat', 'carbohydrate', 'calorie', 'todayFood'));
    }

    public function chat(Request $request)
    {
        // ログインしているユーザを取得
        $user = auth()->user();
        $user_information = User_information::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $date = date('Y-m-d');

        // 指定された日付に食べた料理を取得
        $todayMeals = Today::where('date', $date)
            ->where('user_id', $user->id)
            ->get();

        $foodIds = $todayMeals->pluck('food_id')->toArray();
        $todayFood = Food::whereIn('id', $foodIds)->get();


        $totalNutrition = [
            'total_protein' => 0,
            'total_fat' => 0,
            'total_carbohydrate' => 0,
            'total_solt' => 0,
            'total_calorie' => 0
        ];

        foreach ($todayMeals as $todayMeal) {
            $food = Food::find($todayMeal->food_id);
            $ingredientIds = [$food->ingredient1_id, $food->ingredient2_id, $food->ingredient3_id, $food->ingredient4_id, $food->ingredient5_id];
            $mealNutrition = Ingredient::whereIn('id', $ingredientIds)
                ->selectRaw('SUM(protein) as total_protein, SUM(fat) as total_fat, SUM(carbohydrate) as total_carbohydrate, SUM(solt) as total_solt')
                ->first();

            // 各栄養素を合算
            $totalNutrition['total_protein'] += $mealNutrition->total_protein;
            $totalNutrition['total_fat'] += $mealNutrition->total_fat;
            $totalNutrition['total_carbohydrate'] += $mealNutrition->total_carbohydrate;
            $totalNutrition['total_solt'] += $mealNutrition->total_solt;
            $totalNutrition['total_calorie'] += $food->calorie;
        }
        $protein = $totalNutrition['total_protein'];
        $fat = $totalNutrition['total_fat'];
        $carbohydrate = $totalNutrition['total_carbohydrate'];
        $calorie = $totalNutrition['total_calorie'];


        $system = "以下は、推奨される摂取カロリーや栄養素の情報です。
年齢層: 18~29歳
男性:

- エネルギー摂取量: 2650kcal
- タンパク質: 65g
- 脂質: 59~88g
- 炭水化物: 331~663g
女性:
- エネルギー摂取量: 2000kcal
- タンパク質: 50g
- 脂質: 44~67g
- 炭水化物: 250~500g

年齢層: 30~49歳
男性:

- エネルギー摂取量: 2700kcal
- タンパク質: 65g
- 脂質: 60~90g
- 炭水化物: 338~675g
女性:
- エネルギー摂取量: 2050kcal
- タンパク質: 50g
- 脂質: 45~68g
- 炭水化物: 256~513g

年齢層: 50~64歳
男性:

- エネルギー摂取量: 2600kcal
- タンパク質: 65g
- 脂質: 58~87g
- 炭水化物: 325~650g
女性:
- エネルギー摂取量: 1950kcal
- タンパク質: 50g
- 脂質: 43~65g
- 炭水化物: 244~488g

この情報を基に、私の摂取エネルギーや栄養素のバランスを評価し、必要に応じてアドバイスをしてください。
簡潔に200字以内で。小学生にもわかりやすく、励ましややる気促進の言葉を多くしてください。
#制約条件
#入力文に対して、幼児に話しかけるような口調で返答をしてください。
#入力文に対して、幼児でも分かるような簡単な言葉で返答をしてください。";

        $text = "
年齢: {$user_information->age}歳
性別: {$user_information->gender}
摂取エネルギー: {$totalNutrition['total_calorie']}kcal
タンパク質摂取量: {$totalNutrition['total_protein']}g
脂質摂取量: {$totalNutrition['total_fat']}g
炭水化物摂取量: {$totalNutrition['total_carbohydrate']}g
食塩摂取量: {$totalNutrition['total_solt']}g";

        // ChatGPT APIのエンドポイントURL
        $url = "https://api.openai.com/v1/chat/completions";

        // APIキー
        $api_key = env('OPENAI_API_KEY');

        // ヘッダー
        $headers = array(
            "Content-Type" => "application/json",
            "Authorization" => "Bearer $api_key"
        );

        // パラメータ
        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $system
                ],
                [
                    "role" => "user",
                    "content" => $text
                ]
            ]
        );

        $response = Http::withHeaders($headers)->timeout(120)->post($url, $data);

        if ($response->json('error')) {
            // エラー
            return $response->json('error')['message'];
        }

        $chat = $response->json('choices')[0]['message']['content'];

        return view('chat', compact('chat', 'protein', 'fat', 'carbohydrate', 'calorie', 'todayFood'));
    }
}
