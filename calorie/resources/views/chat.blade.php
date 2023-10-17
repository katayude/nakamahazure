<html>

<head>
    <meta charset='utf-8' />
</head>

<body>
    {{-- フォーム --}}
    <form method="POST" action="{{ route('chat_gpt-chat') }}">
        @csrf
        <textarea rows="10" cols="50" name="sentence">{{ isset($sentence) ? $sentence : '' }}</textarea>
        <button type="submit">ChatGPT</button>
    </form>
</body>

<body>
    <div>
        {{ $chat }}
    </div>
</body>

<body>
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
</body>

</html>
