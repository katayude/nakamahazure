<!-- resources/views/tweet/direct.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('EDIT') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        
        <!-- HTML部分 -->
        <form action="{{ route('recode.edit') }}" method="GET">
            @csrf
        <div class="flex flex-col mb-4">
            <label for="selected_data"><font color="white">データを選択:</font></label>
            <div class="flex">
                <select name="selected_data" id="selected_data" style="width: 100px" onchange="this.form.submit()">
                    <option value=""></option>
                    <option value="food" {{ session('selected_data') === 'food' ? 'selected' : '' }}>Food</option>
                    <option value="todays" {{ session('selected_data') === 'todays' ? 'selected' : '' }}>Todays</option>
                    <option value="dairies" {{ session('selected_data') === 'dairies' ? 'selected' : '' }}>Dairies</option>
                </select>
            </div>
        </div>
        </form>

        <div class="flex flex-col mb-4" id="dateFields" style="display: none;">
            <label for="selected_date"><font color="white">日付を選択:</font></label>
            <div class="flex">
                <input type="date" name="selected_date">
            </div>
        </div>

        <table>
            <tbody>
                @if ($selectedData === 'food')
                          <!-- Food データの表示 -->
                    <tr>
                        <td>food</td>
                    </tr>
                @elseif ($selectedData === 'todays')
                          <!-- Todays データの表示 -->
                    <tr>
                        <td>today</td>
                        <td>{{ $selectedDate }}</td>
                    </tr>
                @elseif ($selectedData === 'dairies')
                          <!-- Dairies データの表示 -->
                    <tr>
                        <td>dairy</td>
                        <td>{{ $selectedDate }}</td>
                    </tr>
                @else
                          <!-- 何も選択されていない場合の表示 -->
                    <tr>
                        <td>No data selected</td>
                    </tr>
                @endif
            </tbody>
        </table>


        <!-- JavaScript部分 -->
        <script>
        function toggleDateFields() {
            var selectedData = document.getElementById('selected_data').value;
            var dateFields = document.getElementById('dateFields');

            if (selectedData === 'food') {
                dateFields.style.display = 'none'; // Food を選択した場合、日付を非表示
            } else if (selectedData === 'todays' || selectedData === 'dairies') {
                dateFields.style.display = 'block'; // Todays または Dairies を選択した場合、日付を表示
            } else {
                dateFields.style.display = 'none'; // それ以外の場合、日付を非表示
            }
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/edit?selected_data=' + selectedData, true);
            xhr.send();
        }
        </script>


    </div>
  </div>
</x-app-layout>