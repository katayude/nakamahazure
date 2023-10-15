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
                    @if(isset($date))
                        <p>You clicked the date: {{ $date }}</p>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js" type="text/javascript"></script>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <canvas id="graph-area1" height="450" width="210"></canvas>
                        <canvas id="graph-area2" height="450" width="210"></canvas>
                        <canvas id="graph-area3" height="450" width="210"></canvas>
                        <canvas id="graph-area4" height="450" width="210"></canvas>
                    </div>
                    <script type="text/javascript">
                        // タンパク質
                        var barChartData1 = {
                            labels : ["タンパク質"],
                            datasets : [
                                {
                                    fillColor : "rgba(240,128,128,0.6)",    // 塗りつぶし色
                                    strokeColor : "rgba(240,128,128,0.9)",  // 枠線の色
                                    highlightFill: "rgba(255,64,64,0.75)",  // マウスが載った際の塗りつぶし色
                                    highlightStroke: "rgba(255,64,64,1)",   // マウスが載った際の枠線の色
                                    data : [{{ $totalNutrition->total_protein }}] 
                                },
                                {
                                    fillColor : "rgba(151,187,205,0.6)",
                                    strokeColor : "rgba(151,187,205,0.9)",
                                    highlightFill : "rgba(64,96,255,0.75)",
                                    highlightStroke : "rgba(64,96,255,1)",
                                    data : [95]
                                }
                            ]
                        }
                        // 炭水化物
                        var barChartData2 = {
                            labels : ["炭水化物"],
                            datasets : [
                                {
                                    fillColor : "rgba(240,128,128,0.6)",    // 塗りつぶし色
                                    strokeColor : "rgba(240,128,128,0.9)",  // 枠線の色
                                    highlightFill: "rgba(255,64,64,0.75)",  // マウスが載った際の塗りつぶし色
                                    highlightStroke: "rgba(255,64,64,1)",   // マウスが載った際の枠線の色
                                    data : [{{ $totalNutrition->total_carbohydrate }}] 
                                },
                                {
                                    fillColor : "rgba(151,187,205,0.6)",
                                    strokeColor : "rgba(151,187,205,0.9)",
                                    highlightFill : "rgba(64,96,255,0.75)",
                                    highlightStroke : "rgba(64,96,255,1)",
                                    data : [95]
                                }
                            ]
                        }
                        // 脂質
                        var barChartData3 = {
                            labels : ["脂質"],
                            datasets : [
                                {
                                    fillColor : "rgba(240,128,128,0.6)",    // 塗りつぶし色
                                    strokeColor : "rgba(240,128,128,0.9)",  // 枠線の色
                                    highlightFill: "rgba(255,64,64,0.75)",  // マウスが載った際の塗りつぶし色
                                    highlightStroke: "rgba(255,64,64,1)",   // マウスが載った際の枠線の色
                                    data : [{{ $totalNutrition->total_fat}}]     
                                },
                                {
                                    fillColor : "rgba(151,187,205,0.6)",
                                    strokeColor : "rgba(151,187,205,0.9)",
                                    highlightFill : "rgba(64,96,255,0.75)",
                                    highlightStroke : "rgba(64,96,255,1)",
                                    data : [95]
                                }
                            ]
                        }
                        // 塩分
                        var barChartData4 = {
                            labels : ["塩分"],
                            datasets : [
                                {
                                    fillColor : "rgba(240,128,128,0.6)",    // 塗りつぶし色
                                    strokeColor : "rgba(240,128,128,0.9)",  // 枠線の色
                                    highlightFill: "rgba(255,64,64,0.75)",  // マウスが載った際の塗りつぶし色
                                    highlightStroke: "rgba(255,64,64,1)",   // マウスが載った際の枠線の色
                                    data : [{{ $totalNutrition->total_solt}}]    
                                },
                                {
                                    fillColor : "rgba(151,187,205,0.6)",
                                    strokeColor : "rgba(151,187,205,0.9)",
                                    highlightFill : "rgba(64,96,255,0.75)",
                                    highlightStroke : "rgba(64,96,255,1)",
                                    data : [95]
                                }
                            ]
                        }

                        window.onload = function () {
                                var ctx1 = document.getElementById("graph-area1").getContext("2d");
                                window.myBar1 = new Chart(ctx1).Bar(barChartData1);

                                var ctx2 = document.getElementById("graph-area2").getContext("2d");
                                window.myBar2 = new Chart(ctx2).Bar(barChartData2);
                                    
                                var ctx3 = document.getElementById("graph-area3").getContext("2d");
                                window.myBar3 = new Chart(ctx3).Bar(barChartData3);
                                    
                                var ctx4 = document.getElementById("graph-area4").getContext("2d");
                                window.myBar4 = new Chart(ctx4).Bar(barChartData4);
                        }
                    </script>
                    <!-- データ -->
                    <p>タンパク質: {{ $totalNutrition->total_protein }} grams</p>
                    <p>炭水化物: {{ $totalNutrition->total_carbohydrate }} grams</p>
                    <p>脂質: {{ $totalNutrition->total_fat }} grams</p>
                    <p>塩分: {{ $totalNutrition->total_solt}} units</p>

                    @else
                        {{ __("You're logged in!") }}
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
