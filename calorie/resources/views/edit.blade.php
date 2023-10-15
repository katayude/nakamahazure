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
        <div class="flex flex-col mb-4">
            <label for="selected_data"><font color="white">データを選択:</font></label>
            <div class="flex">
                <select name="selected_data" id="selected_data" style="width: 100px" onchange="toggleDateFields()">
                    <option value=""></option>
                    <option value="food">Food</option>
                    <option value="todays">Todays</option>
                    <option value="dairies">Dairies</option>
                </select>
            </div>
        </div>

        <div class="flex flex-col mb-4" id="dateFields" style="display: none;">
            <label for="selected_date"><font color="white">日付を選択:</font></label>
            <div class="flex">
                <input type="date" name="selected_date">
            </div>
        </div>



        <!-- JavaScript部分 -->
        <script>
        function toggleDateFields() {
            var selectedData = document.getElementById('selected_data').value;
            var dateFields = document.getElementById('dateFields');

            if (selectedData === 'food') {
                dateFields.style.display = 'none';
            } else {
                dateFields.style.display = 'block';
            }
        }
        </script>


    </div>
  </div>
</x-app-layout>