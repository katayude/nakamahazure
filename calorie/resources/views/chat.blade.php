<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<!--
    <body>
    {{-- フォーム --}}
    <form method="POST" action="{{ route('chat_gpt-chat') }}">
        @csrf
        <textarea rows="10" cols="50" name="sentence">{{ isset($sentence) ? $sentence : '' }}</textarea>
        <button type="submit">ChatGPT</button>
    </form>

    <div>
        {{ $chat }}
    </div>



    {{-- フォーム --}}
    <form method="POST" action="{{ route('user_information.store') }}">
        @csrf
        体重<input type="number" name="weight" value="体重" style="color: black;"><br>
        性別<select name="gender" value="性別" style = "color: black;">
            <option value="男性">男性</option>
            <option value="女性">女性</option>
        </select><br>
        年齢<input type="number" name="age" value="年齢" style="color: black;"><br>
        <button type="submit">user_informationを登録</button>
    </form>
-->
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1>今日の記録</h1>
                    <br>
                    <br>

                    <div class="progress-container">
                        <div class="progress-item">
                            <div class="progress-label">摂取カロリー</div>
                            <progress value={{ $calorie }} max="2650"></progress>
                            <div class="progress-value">{{ $calorie }}kcal/2650kcal</div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-label">たんぱく質</div>
                            <progress value={{ $protein }} max="65"></progress>
                            <div class="progress-value">{{ $protein }}g/65g</div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-label">脂質</div>
                            <progress value={{ $fat }} max="70"></progress>
                            <div class="progress-value">{{ $fat }}g/70g</div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-label">炭水化物</div>
                            <progress value={{ $carbohydrate }} max="450"></progress>
                            <div class="progress-value">{{ $carbohydrate }}g/450g</div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    <ul class="meal-list">
                        @foreach ($todayFood as $meal)
                            <li class="meal-item">
                                <span class="meal-name">{{ $meal->name }}</span>
                                <span class="meal-calorie">{{ $meal->calorie }}kcal</span>
                            </li>
                        @endforeach
                    </ul>

                    <br>
                    <br>

                    <div class="container">
                        <div class="character">
                            <a href="{{ route('chat_gpt-chat') }}">
                                <img src="{{ asset('images/character.png') }}" alt="キャラクター">
                            </a>
                        </div>
                        <div class="speech-bubble">
                            {{ $chat }}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
