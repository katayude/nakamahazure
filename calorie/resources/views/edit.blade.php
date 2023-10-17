<!-- resources/views/tweet/direct.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('Edit') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        
        <!-- HTML部分 -->
        <form action="{{ route('data.show') }}" method="GET">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="selected_data"><font color="white">データを選択:</font></label>
                <div class="flex">
                    <select name="selected_data" id="selected_data" style="width: 120px">
                        <option value=""></option>
                        <option value="food" {{ session('selected_data') === 'food' ? 'selected' : '' }}>Food</option>
                        <option value="todays" {{ session('selected_data') === 'todays' ? 'selected' : '' }}>Todays</option>
                        <option value="dairies" {{ session('selected_data') === 'dairies' ? 'selected' : '' }}>Dairies</option>
                    </select>
                </div>
            </div>
            <button type="submit" style="color: white;">Push</button>
        </form>


        <table>
            <tbody>
                @if ($selectedData === 'food')
                          <!-- Food データの表示 -->
                    @foreach ($data as $food)
                        <tr>
                            <td style="color: white;">{{ $food->name }}</td>
                            <td>
                                <form action="{{ route('food.delete', $food->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color: red;">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                @elseif ($selectedData === 'todays')
                          <!-- Todays データの表示 -->
                    <tr>
                        <td>
                            <form action="{{ route('date.show') }}" method="GET">
                                @csrf
                                <div class="flex flex-col mb-4" id="dateFields"> <!-- "display: none;" を削除 -->
                                    <label for="selected_date"><font color="white">日付を選択:</font></label>
                                    <div class="flex">
                                        <input type="date" name="selected_date" value="{{ session('selected_date') }}">
                                    </div>
                                </div>
                                <button type="submit" style="color: white;">Push</button>
                                <input type="hidden" name="selected_data" value="todays"> <!-- 選択データを送信 -->
                            </form>
                        </td>
                    </tr>

                    @foreach ($data as $today)
                        <tr>
                            <td style="color: white;">{{ App\Models\Food::where('id', $today->food_id)->value('name') }}</td>
                            <td>
                                <form action="{{ route('today.delete', $today->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color: red;">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                @elseif ($selectedData === 'dairies')
                          <!-- Dairies データの表示 -->
                    <tr>
                        <td>
                            <form action="{{ route('date.show') }}" method="GET">
                                @csrf
                                <div class="flex flex-col mb-4" id="dateFields"> <!-- "display: none;" を削除 -->
                                    <label for="selected_date"><font color="white">日付を選択:</font></label>
                                    <div class="flex">
                                        <input type="date" name="selected_date" value="{{ session('selected_date') }}">
                                    </div>
                                </div>
                                <button type="submit" style="color: white;">Push</button>
                            </form>
                        </td>
                    </tr>
                    @foreach ($data as $dairy)
                        <tr>
                            <td style="color: white;">{{ App\Models\Dairy::where('id', $dairy->training_id)->value('name') }}</td>
                            <td>
                                <form action="{{ route('dairy.delete', $dairy->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color: red;">削除</button>
                                </form>
                            </td>
                        </tr>
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
</x-app-layout>