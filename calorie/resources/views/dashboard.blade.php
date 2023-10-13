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
                        $protein = 300;
                        $lipid = 20;
                        $carbohydrates = 500;
                        $in_protein = 450;
                        $in_lipid = 15;
                        $in_carbohydrates = 420;
                        // ▼グラフの中身
                        var barChartData = {
                                labels: ["タンパク質", "脂質", "炭水化物"],
                                datasets: [
                                    {
                                        fillColor: "rgba(240,128,128,0.6)",    // 塗りつぶし色
                                        strokeColor: "rgba(240,128,128,0.9)",  // 枠線の色
                                        highlightFill: "rgba(255,64,64,0.75)",  // マウスが載った際の塗りつぶし色
                                        highlightStroke: "rgba(255,64,64,1)",   // マウスが載った際の枠線の色
                                        data: [$in_protein, $in_lipid, $in_carbohydrates]     // 各棒の値(カンマ区切りで指定)
                                    },
                                    {
                                        fillColor: "rgba(151,187,205,0.6)",
                                        strokeColor: "rgba(151,187,205,0.9)",
                                        highlightFill: "rgba(64,96,255,0.75)",
                                        highlightStroke: "rgba(64,96,255,1)",
                                        data: [$protein, $lipid, $carbohydrates]
                                    }
                                ]

                            }

                            // ▼上記のグラフを描画するための記述
                            window.onload = function () {
                                var ctx = document.getElementById("graph-area").getContext("2d");
                                window.myBar = new Chart(ctx).Bar(barChartData);
                            }
                    </script>
                    <table border="5">
                        <tr>
                            <th>栄養素</th>
                            <th>摂取量(g)</th>
                        </tr>
                        <tr>
                            <td> タンパク質</td>
                            <td>{$in_protein}</td>
                        </tr>
                        <tr>
                            <td> 脂質</td>
                            <td>{$in_protein}</td>
                        </tr>
                        <tr>
                            <td> 炭水化物</td>
                            <td>{$in_protein}</td>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
