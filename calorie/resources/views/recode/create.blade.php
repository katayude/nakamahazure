<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('今日の記録の入力') }}
        </h2>
    </x-slot>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8' />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <style>
            select.datas{
                background-color: rgb(31,41,55);
                color: white;
                margin-bottom: 15px;
                margin-left: 20px;
            }
            input.datas{
                background-color: rgb(31,41,55);
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="container">
                            <table class="create_table">
                                <form method="post" action="{{ route('daily.store') }}">
                                    @csrf
                                    <table class="create_select">
                                        <tr>
                                            <th>登録済みのデータを選択</th>
                                            <td>
                                                <p>食事を選択 </p>
                                                <select class="datas" name="food_name">
                                                    <option value="---">---</option>
                                                    <!-- 以下の部分はfoodテーブルからデータを持ってくる必要があります -->
                                                    @foreach ($foods as $food)
                                                        <option name = "food_name" value="{{ $food->name }}" style="color:white;">{{ $food->name }}</option>
                                                    @endforeach
                                                </select>
                                                @csrf
                                                <p>トレーニングを選択 </p>
                                                <select class="datas" name="training_name">
                                                    <option value="---">---</option>
                                                    <!-- 以下の部分はtrainingテーブルからデータを持ってくる必要があります -->
                                                    @foreach ($trainings as $training)
                                                        <option name="training_name" value="{{ $training->name }}" style="color: white;">{{ $training->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label>
                                                    <input class="datas" type="number" min="0" name="training_minutes" value="" style="color: white;" placeholder="トレーニング時間(分)">
                                                </label>
                                            </td>
                                            <td class="button">
                                                <div class="send-button">
                                                    <input type="submit" value="送信">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <br>

                                <form method="post" action="{{ route('food.store') }}">
                                    @csrf
                                    <table class="create_food">
                                        <tr>
                                            <th>食事を登録 </th>
                                            <td>
                                                <p>料理名を入力</p>
                                                <input type="text" class="datas" name="name" value="" style="color: white;" placeholder="料理名"><br>
                                            </td>
                                            <td class="ingredients">
                                            <p>材料を入力</p>
                                                <select name="ingredient1_id" class="datas" style="color: white;">
                                                    <option value="">---</option>
                                                    <?php
                                                    foreach ($ingredients as $ingredient) {
                                                        echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <input type="number" min="0" class="datas" placeholder="重さ(g)" name="ingredient1_weight" value="" style="color: whitek;"><br>
                                                <select name="ingredient2_id" class="datas" style="color: white;">
                                                    <option value="">---</option>
                                                    <?php
                                                    foreach ($ingredients as $ingredient) {
                                                        echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <input type="number" min="0" class="datas" placeholder="重さ(g)" name="ingredient2_weight" value="" style="color: white;"><br>
                                                <select name="ingredient3_id" class="datas" style="color: white;">
                                                    <option value="">---</option>
                                                    <?php
                                                    foreach ($ingredients as $ingredient) {
                                                        echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <input type="number" min="0" class="datas" placeholder="重さ(g)" name="ingredient3_weight" value="" style="color: white;"><br>
                                                <select name="ingredient4_id" class="datas" style="color: white;">
                                                    <option value="">---</option>
                                                    <?php
                                                    foreach ($ingredients as $ingredient) {
                                                        echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <input type="number" min="0" class="datas" placeholder="重さ(g)" name="ingredient4_weight" value="" style="color: white;"><br>
                                                <select name="ingredient5_id" class="datas" style="color: white;">
                                                    <option value="">---</option>
                                                    <?php
                                                    foreach ($ingredients as $ingredient) {
                                                        echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <input type="number" min="0" class="datas" placeholder="重さ(g)" name="ingredient5_weight" value="" style="color: whi;">
                                            </td>
                                            <td class="button">
                                                <div class="send-button">
                                                    <input type="submit" value="登録">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>    
                                </form>
                                <br>

                                <form method="post" action="{{ route('training.store') }}">
                                    @csrf
                                    <table class="create_training">
                                        <tr>
                                            <th>トレーニングを登録</th>
                                            <td class="training">
                                                <p>トレーニングを入力</p>
                                                <input type="text" name="name" class="datas" value="" style="color: black;" placeholder="トレーニング名">
                                                <input type="number" min="0" name="calorie" class="datas" value="" style="color: black;" placeholder="1分間のカロリー(kcal)">
                                            </td>
                                            <td>
                                                <div class="send-button">
                                                    <input type="submit" value="登録">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</x-app-layout>