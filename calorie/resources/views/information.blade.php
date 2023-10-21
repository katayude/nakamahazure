<!-- resources/views/tweet/direct.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('アプリの概要') }}
    </h2>
  </x-slot>
  <head>
    <style> /*Pushボタン*/
      .push-button {
        display: inline-block;
        background-color: white ;
        border-radius: 20px;
        padding: 5px 10px;
      }
      .push-button button[type="submit" ] {
        background-color: transparent;
        border: none;
        color: black;
      }
      .push-button:hover{
        background-color: gray;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="container">
              <!-- HTML部分 -->
              <form action="{{ route('information') }}" method="GET">
                  @csrf
                  <div class="flex flex-col mb-4">
                      <div class="flex">
                          <select name="selected_data" id="selected_data" style="width: 175px; color: black; padding: 8px; border: 1px solid #ccc;">
                              <option value="アプリについて" {{ session('selected_data') === 'アプリについて' ? 'selected' : '' }}>アプリについて</option>
                              <option value="アプリの使い方" {{ session('selected_data') === 'アプリの使い方' ? 'selected' : '' }}>アプリの使い方</option>
                          </select>
                      </div>
                  </div>
                  <div class="push-button" style="margin-top: 10px; text-align: center;">
                      <button type="submit" style="padding: 8px 12px; background-color: transparent; border: none; color: black; cursor: pointer;">Push</button>
                  </div>
              </form>

              <table style="width: 80%; margin: 20px auto; border-collapse: collapse; border: 1px solid white;">

                  <tbody>

                   <thead>
                    @if ($selectedData === 'アプリについて')
                      <tr>
                          <th style="background-color: #333; color: white; padding: 8px; border: 1px solid white;">アプリの概要</th>
                      </tr>
                    @elseif ($selectedData === 'アプリの使い方')
                      <tr>
                          <th style="background-color: #333; color: white; padding: 8px; border: 1px solid white;">使用方法</th>
                      </tr>
                    @endif
                  </thead>
                      @if ($selectedData === 'アプリについて')
                          <tr>
                              <td style="color: white; padding: 8px; text-align: left;">
<ul>
    <li>このアプリは、健康管理をサポートするためのものです。</li>
    <li>１日に必要なカロリーや栄養素を自身の体重、身長から計算することができます。<br></li>
    <li>食事や運動の記録も行うことができます。<br></li>
    <li>ユーザーデータとして、体重、身長、誕生日の入力が必要です。<br></li>
    <li>計算可能な栄養素は、タンパク質、炭水化物、脂質です。<br></li>
    <li>このアプリでは必要カロリーや栄養素は以下のように計算されます。</li><br>
    <li>男性の場合：<br>
        - 必要カロリー: (66.47 + 13.75×体重 + 5.003×身長 - 6.75×年齢)×1.375<br>
        - 必要な塩分量: 8g<br>
    </li>
    <li>女性の場合：<br>
        - 必要カロリー: (655.1 + 9.563×体重 + 1.850×身長 - 4.676×年齢)×1.375<br>
        - 必要な塩分量: 7g<br>
    </li>
    <li>タンパク質の必要量: 体重×1.3<br></li>
    <li>炭水化物の必要量: 必要カロリー×0.55÷4<br></li>
    <li>脂質の必要量: 必要カロリー÷36<br></li>
    <li>トレーニングでの消費カロリーはMets指標を利用して計算：<br>
        - 計算式: Mets×体重×運動した時間÷60×1.05<br>
    </li>
    <li>毎日記録しながら健康的に生活するように心がけていきましょう！</li>
</ul></td>

                          </tr>
                      @elseif ($selectedData === 'アプリの使い方')
                          <tr>
                              <td style="color: white; padding: 8px; text-align: left;">
<ul>
  <li>ダッシュボードでは今日食べたもの、運動で消費したカロリー、１週間の体重の推移が表示されます。ハリネズミくんをクリックすることでコメントがもらえます。</li>
  <li>カレンダーでは過去の記録を確認することができます。確認したい日付をクリックすることで、その日登録したデータを確認することができます。カロリーや栄養素を表す棒グラフは、青色の方が１日に必要な量で、赤色の方が摂取した量になります。ß
    (注)体重などのユーザーデータが入力されていない場合には性別は男性、体重60kg、身長170cmで計算されたものが表示されます。下に表示される体重の値は0kgと表示されるようになります。
  </li>
  <li>入力ページでは、食事の入力、トレーニングの入力ができます。まずは、料理、トレーニングを登録してから使うようにしましょう。食材の選択肢は今後のアップデートで追加していきます。</li>
  <li>編集画面では、ユーザー情報の編集、登録された食事、トレーニングなどの削除が行うことができます。選択ボックスで編集したい項目を選んで編集をしてください。</li>
  <li>情報画面では、このアプリについての説明と使い方が見れるようになっています。</li>
</ul>
</td>
                          </tr>
                      @else
                          <tr>
                              <td style="color: white; padding: 8px; text-align: center;">確認したいものを選択してPushを押してください。</td>
                          </tr>
                      @endif
                  </tbody>
              </table>

            </div>
          </div>
        </div>
     </div>
    </div>
  </body>  
</x-app-layout>