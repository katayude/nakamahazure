<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Ingredient;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ingredient_weights = [
            $request->input("ingredient1_weight"),
            $request->input("ingredient2_weight"),
            $request->input("ingredient3_weight"),
            $request->input("ingredient4_weight"),
            $request->input("ingredient5_weight"),
        ];

        $ingredient_ids = [
            $request->input("ingredient1_id"),
            $request->input("ingredient2_id"),
            $request->input("ingredient3_id"),
            $request->input("ingredient4_id"),
            $request->input("ingredient5_id"),
        ];

        $ingredient_calories = [];

        for ($i = 0; $i < 5; $i++) {
            if (!empty($ingredient_ids[$i])) {
                $caloriePerGram = Ingredient::where("id", $ingredient_ids[$i])->value('calorie');
                $ingredient_calories[] = $caloriePerGram * ($ingredient_weights[$i] ?? 0) / 100;
            }
        }

        $total_calorie = array_sum($ingredient_calories);

        $foodData = [
            'name' => $request->input('name'),
            'calorie' => $total_calorie,
        ];

        for ($i = 0; $i < 5; $i++) {
            if (!empty($ingredient_ids[$i])) {
                $foodData["ingredient" . ($i + 1) . "_id"] = $ingredient_ids[$i];
                $foodData["ingredient" . ($i + 1) . "_weight"] = $ingredient_weights[$i];
            }
        }

        $result = Food::create($foodData);

        return redirect()->route('calorie.input');  // 適切なルート名に置き換えてください。
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
