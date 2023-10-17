<!-- resources/views/tweet/direct.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('Information') }}
    </h2>
  </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        
        <!-- HTML部分 -->
        <form action="{{ route('information') }}" method="GET">
            @csrf
            <div class="flex flex-col mb-4">
                <div class="flex">
                    <select name="selected_data" id="selected_data" style="width: 175px">
                        <option value="アプリについて" {{ session('selected_data') === 'アプリについて' ? 'selected' : '' }}>アプリについて</option>
                        <option value="使い方" {{ session('selected_data') === '使い方' ? 'selected' : '' }}>使い方</option>
                    </select>
                </div>
            </div>
            <button type="submit" style="color: white;">Push</button>
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
</x-app-layout>