<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <!-- 円グラフ(摂取した栄養素)の表示 -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js" type="text/javascript"></script>
                    <canvas id="graph-area" height="450" width="600"></canvas>
                    <script type="text/javascript">
                        // ▼グラフの中身
                        var pieData = [
                            {
                                value: 240,            // 値
                                color:"#F7464A",       // 色
                                highlight: "#FF5A5E",  // マウスが載った際の色
                                label: "タンパク質"        // ラベル
                            },
                            {
                                value: 50,
                                color: "#41C44E",
                                highlight: "#6CD173",
                                label: "脂質"
                            },
                            {
                                value: 100,
                                color: "#FDB45C",
                                highlight: "#FFC870",
                                label: "炭水化物"
                            },
                            {
                                value: 65,
                                color: "#AA49B8",
                                highlight: "#C583CF",
                                label: "ビタミン"
                            },
                            {
                                value: 30,
                                color: "#4D5360",
                                highlight: "#616774",
                                label: "ミネラル"
                            }

                        ];
                        // ▼上記のグラフを描画するための記述
                        window.onload = function(){
                            var ctx = document.getElementById("graph-area").getContext("2d");
                            window.myPie = new Chart(ctx).Pie(pieData);
                        };
                    </script>
                    <table border="5">
                        <tr>
                            <th>栄養素</th>
                            <th>摂取量(g)</th>
                        </tr>
                        <tr>
                            <td> タンパク質</td>
                            <td> 240</td>
                        </tr>
                        <tr>
                            <td> 脂質</td>
                            <td> 50</td>
                        </tr>
                        <tr>
                            <td> 炭水化物</td>
                            <td> 100</td>
                        </tr>
                        <tr>
                            <td> ビタミン</td>
                            <td> 65</td>
                        </tr>
                        <tr>
                            <td> ミネラル</td>
                            <td> 30</td>
                        </tr>

                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
