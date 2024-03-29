<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('データの編集') }}
    </h2>
  </x-slot>
    <head>
        <meta charset='utf-8' />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex-container" style="diaplay:flex">
                        <!-- HTML部分 -->
                        <form action="{{ route('data.show') }}" method="GET">
                            @csrf
                            <div class="flex-container">
                                <div class="flex flex-col mb-4">
                                    <label for="selected_data"><font color="white">データを選択:</font></label>
                                    <div class="flex">
                                        <select name="selected_data" class="datas" id="selected_data" style="width: 130px; color:white ">
                                            <option value="">---</option>
                                            <option value="user_data" {{ session('selected_data') === 'user_data' ? 'selected' : '' }}>user_data</option>
                                            <option value="food" {{ session('selected_data') === 'food' ? 'selected' : '' }}>Food</option>
                                            <option value="training" {{ session('selected_data') === 'training' ? 'selected' : '' }}>Training</option>
                                            <option value="todays" {{ session('selected_data') === 'todays' ? 'selected' : '' }}>Todays</option>
                                            <option value="dairies" {{ session('selected_data') === 'dairies' ? 'selected' : '' }}>Dairies</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="send-button">
                                    <button type="submit">決定</button>
                                </div>
                            </div>
                        </form>
                            <table>
                                <tbody>
                                    @if ($selectedData === 'user_data')
                                        <form action="{{ route('submitUserData') }}" method="post">
                                            @csrf
                                            <div>
                                                <label for="weight" style="color: white;">体重:</label>
                                                <input type="number" min="0" style="color: black;" name="weight" id="weight" required>
                                            </div>
                                            <div>
                                                <label for="height" style="color: white;">身長:</label>
                                                <input type="number" min="0" style="color: black;" name="height" id="height" value="{{ old('height', session('height')) }}" required>
                                            </div>
                                            <div>
                                                <label for="birthdate" style="color: white;">誕生日:</label>
                                                    <select name="birth_year" style="color: black;" id="birth_year" required>
                                                        @for ($i = 1900; $i <= now()->year; $i++)
                                                            <option value="{{ $i }}"{{ session('birth_year') == $i ? 'selected' : '' }}>{{ $i }}年</option>
                                                        @endfor
                                                    </select>
                                                    <select name="birth_month" style="color: black;" id="birth_month" required>
                                                        @for ($i = 1; $i <= 12; $i++)
                                                            <option value="{{ $i }}"{{ session('birth_month') == $i ? 'selected' : '' }}>{{ $i }}月</option>
                                                        @endfor
                                                    </select>
                                                    <select name="birth_day" style="color: black;" id="birth_day" required>
                                                        @for ($i = 1; $i <= 31; $i++)
                                                            <option value="{{ $i }}"{{ session('birth_day') == $i ? 'selected' : '' }}>{{ $i }}日</option>
                                                        @endfor
                                                    </select>
                                            </div>
                                            <div>
                                                <label for="gender" style="color: white;">性別:</label>
                                                <select name="gender" style="color: black;" id="gender" required>
                                                    <option value="男"{{ session('gender') == '男' ? 'selected' : '' }}>男性</option>
                                                    <option value="女"{{ session('gender') == '女' ? 'selected' : '' }}>女性</option>
                                                </select>
                                            </div>
                                            <div class="send-button">
                                                <button type="submit">決定</button>
                                            </div>
                                        </form>

                                    @elseif ($selectedData === 'food')
                                            <!-- Food データの表示 -->
                                        @foreach ($data as $food)
                                        <span class="food-content" style="display:flex;">
                                            <ul class="meal-list" style="list-style: none;">
                                                <li class="meal-item" style="margin-left:30px">
                                                    <span class="meal-name">{{ $food->name }}</span>
                                                </li>
                                            </ul>
                                                <form action="{{ route('food.delete', $food->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <span class="delete-button">
                                                        <button type="submit">×削除</button>
                                                    </span>
                                                </form>
                                        </span>
                                        @endforeach

                                    @elseif ($selectedData === 'training')
                                            <!-- Training データの表示 -->
                                        @foreach ($data as $training)
                                        <span class="training-content" style="display:flex;">
                                            <ul class="meal-list" style="list-style: none;">
                                                <li class="meal-item blue-border" style="margin-left:30px">
                                                    <span class="meal-name">{{ $training->name }}</span>
                                                </li>
                                            </ul>
                                                <form action="{{ route('training.delete', $training->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <span class="delete-button">
                                                        <button type="submit">×削除</button>
                                                    </span>
                                                </form>
                                        </span>
                                        @endforeach

                                    @elseif ($selectedData === 'todays')
                                        <!-- Todays データの表示 -->
                                        <form action="{{ route('date.show') }}" method="GET">
                                            @csrf
                                            <div class="flex flex-col mb-4" id="dateFields"> <!-- "display: none;" を削除 -->
                                                <label for="selected_date"><font color="white">日付を選択:</font></label>
                                                <div class="flex">
                                                    <input type="date" style="color: black;" name="selected_date" value="{{ session('selected_date') }}">
                                                </div>
                                            </div>
                                            <div class="send-button">
                                                <button type="submit">決定</button>
                                            </div>
                                            <input type="hidden" name="selected_data" value="todays"> <!-- 選択データを送信 -->
                                        </form>
                                        @foreach ($data as $today)
                                        <span class="today-content" style="display:flex;">
                                            <ul class="meal-list" style="list-style: none;">
                                                <li class="meal-item" style="margin-left:30px">
                                                    <span class="meal-name">{{ App\Models\Food::where('id', $today->food_id)->value('name') }}</span>
                                                </li>
                                            </ul>
                                            <form action="{{ route('today.delete', $today->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span class="delete-button">
                                                    <button type="submit">×削除</button>
                                                </span>
                                            </form>
                                        </span>
                                        @endforeach


                                    @elseif ($selectedData === 'dairies')
                                        <!-- Dairies データの表示 -->
                                            <form action="{{ route('date.show') }}" method="GET">
                                                @csrf
                                                <div class="flex flex-col mb-4" id="dateFields"> <!-- "display: none;" を削除 -->
                                                    <label for="selected_date"><font color="white">日付を選択:</font></label>
                                                    <div class="flex">
                                                        <input type="date" style="color: black;" name="selected_date" value="{{ session('selected_date') }}">
                                                    </div>
                                                </div>
                                                <div class="send-button">
                                                    <button type="submit">決定</button>
                                                </div>
                                                <input type="hidden" name="selected_data" value="dairies"> <!-- 選択データを送信 -->
                                            </form>
                                        @foreach ($data as $dairy)
                                        <span class="dairies-content" style="display:flex;">
                                            <ul class="meal-list" style="list-style: none;">
                                                <li class="meal-item blue-border" style="margin-left:30px">
                                                    <span class="meal-name">{{ App\Models\Training::where('id', $dairy->training_id)->value('name') }}</span>
                                                </li>
                                            </ul>
                                            <form action="{{ route('dairy.delete', $dairy->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span class="delete-button">
                                                    <button type="submit">×削除</button>
                                                </span>
                                            </form>
                                        </span>
                                        @endforeach
                                    @else
                                        <!-- 何も選択されていない場合の表示 -->
                                        <tr>
                                            <td style="color: white;">No data selected</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>