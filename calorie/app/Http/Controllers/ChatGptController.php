<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ChatGptController extends Controller

{
    public function index(Request $request)
    {
        $chat = "ChatGPTの回答";

        return view('chat', compact('chat'));
    }

    public function chat(Request $request)
    {

        $msg = [
            ['role' => 'system', 'content' => '日本語での回答'],
            ['role' => 'user', 'content' => $request->sentence],
        ];
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $msg,
        ]);

        $chat = $result->choices[0]->message->content;


        return response()->view('chat', compact('chat'));
    }
}
