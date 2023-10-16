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
        }

        return view('dashboard', [
            'date' => $date,
            'totalNutrition' => (object) $totalNutrition,
        ]);
    }
}
