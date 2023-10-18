<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Training;
use App\Models\Ingredient;
use App\Models\Food;
use App\Models\Dairy;
use App\Models\Today;
use App\Models\User;
use Auth;


class RecodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function input()
    {
        $foods = Food::all();
        $ingredients = Ingredient::all();
        $categories = Category::all();
        $trainings = Training::all();
        return response()->view('recode.create', compact('foods', 'categories', 'trainings', 'ingredients'));
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
        //
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
    public function edit()
    {
        $selectedDate = null;
        $selectedData = null;
        $data = null;
        return response()->view('edit', compact('selectedData', 'selectedData', 'data'));
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

    public function showData(Request $request) {
        $user = auth()->user();
        $selectedData = $request->input('selected_data');
        $data = [];

        if ($selectedData === 'food') {
            $data = Food::where('user_id', $user->id)->get();
        } elseif ($selectedData === 'training') {
            $data = Training::where('user_id', $user->id)->get();
        }

        session(['selected_data' => $selectedData]);


        return view('edit', compact('selectedData', 'data'));
    }

    public function showDate(Request $request) {
        $user = auth()->user();
        $selectedDate = $request->input('selected_date');
        $selectedData = $request->input('selected_data');
        $data = [];

        if ($selectedData === 'todays') {
            $data = Today::where('date', $selectedDate)->where('user_id', $user->id)->get(); // Todays テーブルからデータ取得
        } elseif ($selectedData === 'dairies') {
            $data = Dairy::where('date', $selectedDate)->where('user_id', $user->id)->get(); // Dairies テーブルからデータ取得
        }

        session(['selected_data' => $selectedData]);
        session(['selected_date' => $selectedDate]);

        return view('edit', compact('selectedData','selectedDate' , 'data'));
    }

    public function infor(Request $request)
    {
        $user = auth()->user();
        $selectedData = null;
        $selectedData = $request->input('selected_data');
        session(['selected_data' => $selectedData]);
        return view('information', compact('selectedData'));
    }

    public function deleteFood(Request $request, $id) {
        // データを削除する処理
        Food::destroy($id);
        $selectedData = 'food';
        $data = Food::all();
        return view('edit', compact('selectedData', 'data'));
    }

    public function deleteTraining(Request $request, $id) {
        // データを削除する処理
        Training::destroy($id);
        $selectedData = 'food';
        $data = Training::all();
        return view('edit', compact('selectedData', 'data'));
    }

    public function deleteToday(Request $request, $id) {
        // データを削除する処理
        $date = $request->input('selected_date');
        Today::destroy($id);
        $selectedData = 'todays';
        $selectedDate = $date;
        $data = Today::where('date', $selectedDate)->get();
        return view('edit', compact('selectedData','selectedDate', 'date', 'data'));
    }

    public function deleteDairy(Request $request, $id) {
        // データを削除する処理
        $date = $request->input('selected_date');
        Dairy::destroy($id);
        $selectedData = 'dairies';
        $selectedDate = $date;
        $data = Dairy::where('date', $selectedDate)->get();
        return view('edit', compact('selectedData','selectedDate', 'date', 'data'));
    }


}
