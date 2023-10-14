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
            // ログインしているユーザの情報を取得
            $user = auth()->user();

            // 選択された日付に関連する食事を取得
            $meals = Today::where('date', $date)
                ->join('food', 'food.id', '=', 'todays.food_id')
                ->where('todays.user_id', $user->id)
                ->get();

            // 各食事の栄養素を取得し、合計値を計算
            $totalNutrition = [
                'protein' => 0,
                'fat' => 0,
                'carbohydrate' => 0,
                'vitamin' => 0,
                'minerals' => 0,
            ];

            foreach ($meals as $meal) {
                $food = Food::find($meal->food_id);
                $ingredients = Ingredient::find($food->ingredient1_id);
                $nutritions = Nutritions::find($ingredients->id);

                $totalNutrition['protein'] += $nutritions->protein;
                $totalNutrition['fat'] += $nutritions->fat;
                $totalNutrition['carbohydrate'] += $nutritions->carbohydrate;
                $totalNutrition['vitamin'] += $nutritions->vitamin;
                $totalNutrition['minerals'] += $nutritions->minerals;
            }

            return view('dashboard', [
                'date' => $date,
                'totalNutrition' => $totalNutrition,
            ]);
        }
    }
?>