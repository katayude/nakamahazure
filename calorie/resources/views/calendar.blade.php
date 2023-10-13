<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset='utf-8' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.10.0/main.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.10.0/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.10.0/main.js'></script>
</head>
<body>
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
</body>
</html>
