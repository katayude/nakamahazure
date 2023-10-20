<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Training;
use App\Models\Ingredient;
use App\Models\Food;
use App\Models\Dairy;
use App\Models\Today;
use App\Models\User;
use App\Models\User_information;
use Carbon\Carbon;
use Auth;


class RecodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function input()
    {
        $userId = Auth::id();
        $foods = Food::where('user_id', $userId)->get();
        $ingredients = Ingredient::all();
        $categories = Category::all();
        $trainings = Training::where('user_id', $userId)->get();
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
        } elseif ($selectedData === 'user_data') {
            $data = User_information::where('user_id', $user->id)->get();
        }
        $user_id = Auth::id();

        $latestUserInfo = \DB::table('user_informations')
                            ->where('user_id', $user_id)
                            ->orderBy('id', 'desc')
                            ->first();

        if ($latestUserInfo) {
            $birthdate = new \DateTime($latestUserInfo->birthday);
            $year = $birthdate->format('Y');
            $month = $birthdate->format('m');
            $day = $birthdate->format('d');
            $gender = $latestUserInfo->gender;
            $height = $latestUserInfo->height;
        } else {
            $year = null;
            $month = null;
            $day = null;
            $gender = null;
            $height = null;
        }

        session(['selected_data' => $selectedData]);
        session(['user_data' => $selectedData]);
        session(['birth_year' => $year]);
        session(['birth_month' => $month]);
        session(['birth_day' => $day]);
        session(['gender' => $gender]);
        session(['height' => $height]);
        return response()->view('edit', compact('selectedData', 'year', 'month', 'day', 'gender','height','data'));

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

    public function submitForm(Request $request) {
        $data = $request->validate([
            'weight' => 'required|numeric',
            'birth_year' => 'required|integer|between:1900,' . now()->year,
            'birth_month' => 'required|integer|between:1,12',
            'birth_day' => 'required|integer|between:1,31',
            'gender' => 'required|in:男,女',
            'height' => 'required|integer|between:1,250',
        ]);

        // 今日の日付を取得
        $data['date'] = now()->format('Y-m-d');

        // 年齢の計算
        $birthdate = Carbon::createFromDate($data['birth_year'], $data['birth_month'], $data['birth_day']);
        $data['age'] = $birthdate->age;

        $birthday = sprintf('%04d-%02d-%02d', $year, $month, $day);
        $data['birthday'] = $birthday;

        // ログインしているユーザーのIDを取得
        $data['user_id'] = Auth::id();

        // created_at と updated_at を設定
        $data['created_at'] = now();
        $data['updated_at'] = now();

        // 不要なキーの削除
        unset($data['birth_year'], $data['birth_month'], $data['birth_day']);

        // user_informationテーブルにデータを保存
        DB::table('user_informations')->insert($data);
        $selectedData = 'user_data';
        $year = $request->input('birth_year');
        $month = $request->input('birth_month');
        $day = $request->input('birth_day');
        $gender = $request->input('gender');
        $height = $request->input('height');
        session(['user_data' => $selectedData]);
        session(['birth_year' => $year]);
        session(['birth_month' => $month]);
        session(['birth_day' => $day]);
        session(['gender' => $gender]);
        session(['height' => $height]);
        return response()->view('edit', compact('selectedData', 'year', 'month', 'day', 'gender','height'));
    }



}
