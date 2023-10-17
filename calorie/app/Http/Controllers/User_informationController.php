<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_information;
use Illuminate\Support\Facades\Auth;

class User_informationController extends Controller
{
    public function store(Request $request)
    {
        $date = date('Y-m-d'); // 現在の日付を取得（例: "2023-10-13"）
        $userId = Auth::id();
        $result = User_information::create([
            'user_id' => $userId,
            'weight' => $request->weight,
            'gender' => $request->gender,
            'age' => $request->age,
            'date' => $date,
        ]);

        return redirect()->route('chat_gpt-index');
    }
}
