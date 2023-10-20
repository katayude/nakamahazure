<!-- resources/views/tweet/direct.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('Information') }}
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
                      <select name="selected_data" id="selected_data" style="width: 175px; color: black;">
                        <option value="アプリについて" {{ session('selected_data') === 'アプリについて' ? 'selected' : '' }}>アプリについて</option>
                        <option value="使い方" {{ session('selected_data') === '使い方' ? 'selected' : '' }}>使い方</option>
                      </select>
                    </div>
                  </div>
                  <div class="push-button">
                    <button type="submit">Push</button>
                  </div>
              </form>
              <table>
                <tbody>
                  @if ($selectedData === 'アプリについて')
                    <tr>
                      <td style="color: white;">アプリについて書く</td>
                    </tr>
                  @elseif ($selectedData === '使い方')
                    <tr>
                      <td style="color: white;">使い方の説明を書く</td>
                    </tr>
                  @else
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