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

</html>
