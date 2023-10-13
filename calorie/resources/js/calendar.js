import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction"; // インタラクションプラグインを追加

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin, interactionPlugin], // インタラクションプラグインを有効にする
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "",
    },
    dateClick: function (info) {
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
