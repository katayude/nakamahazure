<?php

namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\Food;
    use App\Models\Today;
    use App\Models\Ingredient;
    use App\Models\Nutritions;


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

        return view('dashboard', [
            'date' => $date,
            'totalNutrition' => (object) $totalNutrition,
        ]);

    }
}
