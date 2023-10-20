<?php

namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\Food;
    use App\Models\Today;
    use App\Models\Ingredient;
    use App\Models\Nutritions;
    use App\Models\User_information;
    use Auth;


class NutritionController extends Controller
{
    public function show($date)
    {
        // ログインしているユーザを取得
        $user = auth()->user();

        // 指定された日付に食べた料理を取得
        $todayMeals = Today::where('date', $date)
            ->where('user_id', $user->id)
            ->get();

        $totalNutrition = [
            'total_protein' => 0,
            'total_fat' => 0,
            'total_carbohydrate' => 0,
            'total_solt' => 0,
            'total_calorie'=>0.
        ];

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
        $protein = round($userInfo->weight * 1.3, 0);

        // 炭水化物の計算: 必要カロリー * 0.55 / 4
        $carbohydrate = round($requiredCalories * 0.55 / 4, 0);

        // 脂質の計算: 必要カロリー * 0.25 / 9
        $fat = round($requiredCalories * 0.25 / 9, 0);

        return view('dashboard', [
            'date' => $date,
            'totalNutrition' => (object) $totalNutrition,
            'requiredCalories' => $requiredCalories,
            'protein' => $protein,
            'carbohydrate' => $carbohydrate,
            'fat' =>$fat,
            'salt' =>$salt,
        ]);

    }
}
