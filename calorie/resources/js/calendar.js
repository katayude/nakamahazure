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
        var formattedDate = clickedDate.toISOString().slice(0, 10); // 日付をYYYY-MM-DD形式にフォーマット

        // ページをリダイレクト
        window.location.href = '/your-redirect-url/' + formattedDate;
    },
});
calendar.render();
