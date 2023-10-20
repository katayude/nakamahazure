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
use App\Models\Dairy;
use Carbon\Carbon;
use Auth;

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
                    $ingredientWeights = [$food->ingredient1_weight, $food->ingredient2_weight, $food->ingredient3_weight, $food->ingredient4_weight, $food->ingredient5_weight];

                    for ($i = 0; $i < count($ingredientIds); $i++) {
                        $ingredient = Ingredient::find($ingredientIds[$i]);
                        if ($ingredient) {
                            $weightFactor = $ingredientWeights[$i] / 100;
                            $totalNutrition['total_protein'] += $ingredient->protein * $weightFactor;
                            $totalNutrition['total_fat'] += $ingredient->fat * $weightFactor;
                            $totalNutrition['total_carbohydrate'] += $ingredient->carbohydrate * $weightFactor;
                            $totalNutrition['total_solt'] += $ingredient->solt * $weightFactor;
                            $totalNutrition['total_calorie'] += $ingredient->calorie * $weightFactor;
                        }
                    }
                }

                $totalNutrition['total_protein'] = round($totalNutrition['total_protein'], 1);
                $totalNutrition['total_fat'] = round($totalNutrition['total_fat'], 1);
                $totalNutrition['total_carbohydrate'] = round($totalNutrition['total_carbohydrate'], 1);
                $totalNutrition['total_solt'] = round($totalNutrition['total_solt'], 1);
                $totalNutrition['total_calorie'] = round($totalNutrition['total_calorie'], 1);

                $userInfo = User_information::where('user_id',$user->id )->orderBy('id', 'desc')->first();

                if ($userInfo->gender == '男') {
                    $BMR = 66.47 + (13.75 * $userInfo->weight) + (5.003 * $userInfo->height) - (6.75 * Auth::user()->age);
                    $salt = 8;
                } else { // female
                    $BMR = 655.1 + (9.563 * $userInfo->weight) + (1.850 * $userInfo->height) - (4.676 * Auth::user()->age);
                    $salt = 7;
                }

                $activityMultiplier = 1.375;
                $requiredCalories = round($BMR * $activityMultiplier, -1);
                // タンパク質の計算: 体重 * 1.3
                $needprotein = round($userInfo->weight * 1.3, 0);

                // 炭水化物の計算: 必要カロリー * 0.55 / 4
                $needcarbohydrate = round($requiredCalories * 0.55 / 4, 0);

                // 脂質の計算: 必要カロリー * 0.25 / 9
                $needfat = round($requiredCalories * 0.25 / 9, 0);

                $consumeCalories = Dairy::where('user_id', $user->id)
                        ->where('date', $date)
                        ->sum('calorie');

        $protein = $totalNutrition['total_protein'];
        $fat = $totalNutrition['total_fat'];
        $carbohydrate = $totalNutrition['total_carbohydrate'];
        $calorie = $totalNutrition['total_calorie'];

        $chat = "今日は何を食べたかな？";

        $endDate = Carbon::today();
        $startDate = $endDate->copy()->subDays(6);

        $dates = [];
        for ($currentDate = $startDate; $currentDate <= $endDate; $currentDate->addDay()) {
            $dates[] = $currentDate->format('Y-m-d');
        }

        $weights = [];
        foreach ($dates as $currentDate) {
            $weight = User_information::where('user_id', Auth::id())
                        ->where('date', $currentDate)
                        ->orderBy('id', 'desc')
                        ->first();

            $weights[] = $weight ? $weight->weight : null;
        }


        return view('chat', compact('chat', 'protein', 'fat', 'carbohydrate', 'calorie', 'todayFood','needprotein','needcarbohydrate','needfat','requiredCalories','consumeCalories', 'dates', 'weights'));



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
            $ingredientWeights = [$food->ingredient1_weight, $food->ingredient2_weight, $food->ingredient3_weight, $food->ingredient4_weight, $food->ingredient5_weight];

            for ($i = 0; $i < count($ingredientIds); $i++) {
                $ingredient = Ingredient::find($ingredientIds[$i]);
                if ($ingredient) {
                    $weightFactor = $ingredientWeights[$i] / 100;
                    $totalNutrition['total_protein'] += $ingredient->protein * $weightFactor;
                    $totalNutrition['total_fat'] += $ingredient->fat * $weightFactor;
                    $totalNutrition['total_carbohydrate'] += $ingredient->carbohydrate * $weightFactor;
                    $totalNutrition['total_solt'] += $ingredient->solt * $weightFactor;
                    $totalNutrition['total_calorie'] += $ingredient->calorie * $weightFactor;
                }
            }
        }

        $totalNutrition['total_protein'] = round($totalNutrition['total_protein'], 1);
        $totalNutrition['total_fat'] = round($totalNutrition['total_fat'], 1);
        $totalNutrition['total_carbohydrate'] = round($totalNutrition['total_carbohydrate'], 1);
        $totalNutrition['total_solt'] = round($totalNutrition['total_solt'], 1);
        $totalNutrition['total_calorie'] = round($totalNutrition['total_calorie'], 1);
        
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
