<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('カレンダー') }}
        </h2>
    </x-slot>
    <!DOCTYPE html>
    <html>
        <head>
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            <meta charset='utf-8' />
            <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.10.0/main.min.js'></script>
            <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.10.0/main.js'></script>
        </head>

        <body>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg max-w-7xl">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="container">
                                <div id='calendar'></div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var calendarEl = document.getElementById('calendar');
                                        var calendar = new FullCalendar.Calendar(calendarEl, {
                                            plugins: ['interaction'], // Interaction プラグインを有効にする

                                            // カレンダーの設定...

                                            dateClick: function(info) {
                                                // クリックした日付を取得
                                                var clickedDate = info.date;
                                                
                                                // ローカルタイムゾーンでフォーマット
                                                var year = clickedDate.getFullYear();
                                                var month = String(clickedDate.getMonth() + 1).padStart(2, '0');
                                                var day = String(clickedDate.getDate()).padStart(2, '0');
                                                var formattedDate = year + '-' + month + '-' + day;
                                                
                                                // ページをリダイレクト
                                                window.location.href = '/dashboard/' + formattedDate;
                                            }
                                        });
                                        calendar.render();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>