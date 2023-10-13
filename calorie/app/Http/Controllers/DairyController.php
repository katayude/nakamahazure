<?php

namespace App\Http\Controllers;

use App\Models\Dairy;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Training;
use App\Models\Today;

use Illuminate\Support\Facades\Auth;

class DairyController extends Controller
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
        ddd($request);

        $foodName = $request->input('food_name');
        $trainingName = $request->input('training_name');
        $date = date('Y-m-d'); // 現在の日付を取得（例: "2023-10-13"）
        $userId = Auth::id();

        $food = Food::where('name', $foodName)->first();
        if ($food) {
            Today::create([
                'user_id' => $userId,
                'food_id' => $food->id,
                'date' => $date,
                'calorie' => $food->calorie
            ]);
        }

        // trainingテーブルからデータの取得
        $training = Training::where('name', $trainingName)->first();
        if ($training) {
            Dairy::create([
                'user_id' => $userId,
                'training_id' => $training->id,
                'date' => $date,
                'calorie' => $training->calorie
            ]);
        }

        return redirect()->route('dashboard');
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
