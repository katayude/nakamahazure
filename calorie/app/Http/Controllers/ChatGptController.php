<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ChatGptController extends Controller

{
    public function index(Request $request)
    {
        $chat = "ChatGPTの回答";

        return view('chat', compact('chat'));
    }

    public function chat(Request $request)
    {
        $client = new Client(['timeout' => 60.0]);
        $system = "以下は、推奨される摂取カロリーや栄養素の情報です。
年齢層: 18~29歳
男性:

- エネルギー摂取量: 2650kcal
- タンパク質: 65g
- 脂質: 59~88g
- 炭水化物: 331~663g
女性:
- エネルギー摂取量: 2000kcal
- タンパク質: 50g
- 脂質: 44~67g
- 炭水化物: 250~500g

年齢層: 30~49歳
男性:

- エネルギー摂取量: 2700kcal
- タンパク質: 65g
- 脂質: 60~90g
- 炭水化物: 338~675g
女性:
- エネルギー摂取量: 2050kcal
- タンパク質: 50g
- 脂質: 45~68g
- 炭水化物: 256~513g

年齢層: 50~64歳
男性:

- エネルギー摂取量: 2600kcal
- タンパク質: 65g
- 脂質: 58~87g
- 炭水化物: 325~650g
女性:
- エネルギー摂取量: 1950kcal
- タンパク質: 50g
- 脂質: 43~65g
- 炭水化物: 244~488g

この情報を基に、私の摂取エネルギーや栄養素のバランスを評価し、必要に応じてアドバイスをしてください。簡潔に300字いないで。小学生にもわかりやすく、励ましややる気促進の言葉を多くしてください。";
        $user = $request->sentence;
        // ChatGPT APIのエンドポイントURL
        $url = "https://api.openai.com/v1/chat/completions";

        // APIキー
        $api_key = env('OPENAI_API_KEY');

        // ヘッダー
        $headers = array(
            "Content-Type" => "application/json",
            "Authorization" => "Bearer $api_key"
        );

        // パラメータ
        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $system
                ],
                [
                    "role" => "user",
                    "content" => $user
                ]
            ]
        );

        $response = Http::withHeaders($headers)->timeout(120)->post($url, $data);

        if ($response->json('error')) {
            // エラー
            return $response->json('error')['message'];
        }

        $chat = $response->json('choices')[0]['message']['content'];

        return view('chat', compact('chat'));
    }
}
