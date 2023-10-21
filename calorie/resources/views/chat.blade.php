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
                            <progress value={{ $calorie }} max= {{ $requiredCalories }} ></progress>
                            <div class="progress-value">{{ $calorie }}kcal/{{ $requiredCalories }}kcal</div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-label">たんぱく質</div>
                            <progress value={{ $protein }} max={{ $needprotein }}></progress>
                            <div class="progress-value">{{ $protein }}g/{{ $needprotein }}g</div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-label">炭水化物</div>
                            <progress value={{ $carbohydrate }} max={{ $needcarbohydrate }}></progress>
                            <div class="progress-value">{{ $carbohydrate }}g/{{ $needcarbohydrate }}g</div>
                        </div>

                        <div class="progress-item">
                            <div class="progress-label">脂質</div>
                            <progress value={{ $fat }} max={{ $needfat }}></progress>
                            <div class="progress-value">{{ $fat }}g/{{ $needfat }}g</div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    <style>
                        .flex-container {
                            display: flex;
                            justify-content: space-between; /* アイテムの間に均等なスペースを作成 */
                        }

                        .meal-item.blue-border {
                            border-left: 5px solid blue;
                        }

                        .meal-item {
                            width: 320px;  /* ボックスの幅を200pxに固定 */
                            height: 50px;  /* ボックスの高さを50pxに固定 */
                        }

                        #chart {
                            width: 600px;
                            height: 400px;
                        }

                    </style>

                    <div class="flex-container">

                        <div>
                            <ul class="meal-list">
                                @foreach ($todayFood as $meal)
                                    <li class="meal-item">
                                        <span class="meal-name">{{ $meal->name }}</span>
                                        <span class="meal-calorie">{{ $meal->calorie }}kcal</span>
                                    </li>
                                @endforeach
                            </ul>

                            <ul class="meal-list">
                                <li class="meal-item blue-border">
                                    <span class="meal-name">トレーニング</span>
                                    <span class="meal-calorie">{{ $consumeCalories }}kcal</span>
                                </li>
                            </ul>
                        </div>

                        <div style="width: 50%;">
                            <canvas id="chart"></canvas>
                        </div>

                    </div>


                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            var ctx = document.getElementById('chart').getContext('2d');
                            var weights = @json($weights); // 体重データを変数に代入
                            var currentWeight = weights.slice(-1)[0]; // 体重データの最後の値を取得
                            var chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: @json($dates),  // 日付データ
                                    datasets: [{
                                        label: '体重の推移',
                                        data: @json($weights),  // 体重データ
                                        backgroundColor: 'rgba(255, 255, 255, 1)',
                                        borderColor: 'rgba(255, 255, 255, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            min: currentWeight - 10,  // 今日の体重から10kg減った値
                                            max: currentWeight + 10,  // 今日の体重から10kg増えた値
                                            ticks: {
                                                color: 'rgba(255, 255, 255, 1)'  // Y軸の目盛りの文字色を白に設定
                                            }
                                        },
                                        x: {
                                            ticks: {
                                                color: 'rgba(255, 255, 255, 1)'  // X軸の目盛りの文字色を白に設定
                                            }
                                        }
                                    },
                                    plugins: {
                                        legend: {
                                            labels: {
                                                color: 'rgba(255, 255, 255, 1)'  // 凡例の文字色を白に設定
                                            }
                                        }
                                    }
                                }
                            });
                        </script>

                    </body>
                    </html>


                    <br>



                    <!--以下でキャラクターの表示-->
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
