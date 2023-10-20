<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('今日の記録') }}
        </h2>
    </x-slot>
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            .button-container {
                display: inline-block; 
                background-color: white ; 
                border-radius: 20px;
                padding: 5px 10px; /
            }
            .button-container input[type="submit"] {
                background-color: transparent; 
                border: none; 
                color: black; 
            }
            .button-container:hover{
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
                            <form method="post" action="{{ route('daily.store') }}">
                            @csrf
                            <p>食事を選択 </p>
                            <select name="food_name" style="color: black;">
                                <option value="---">---</option>
                                <!-- 以下の部分はfoodテーブルからデータを持ってくる必要があります -->
                                @foreach ($foods as $food)
                                    <option name = "food_name" value="{{ $food->name }}" style="color: black;">{{ $food->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>
                            @csrf
                            <p>トレーニングを選択 </p>
                            <select name="training_name" style="color: black;">
                                <option value="---">---</option>
                                <!-- 以下の部分はtrainingテーブルからデータを持ってくる必要があります -->
                                @foreach ($trainings as $training)
                                    <option name="training_name" value="{{ $training->name }}" style="color: black;">{{ $training->name }}</option>
                                @endforeach
                            </select>
                            <label>
                                <input type="number" name="training_minutes" value="" style="color: black;">
                                トレーニング時間(分)
                            </label>
                            <div class="button-container">
                                <input type="submit" value="送信">
                            </div>
                        </form>
                        <br>

                        <form method="post" action="{{ route('food.store') }}">
                            @csrf
                            <p>食事を登録 </p>
                            <input type="text" name="name" value="料理名" style="color: black;">
                            <select name="ingredient1_id" style="color: black;">
                                <option value="">---</option>
                                <?php
                                foreach ($ingredients as $ingredient) {
                                    echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                                }
                                ?>
                            </select>
                            <input type="number" name="ingredient1_weight" value="" style="color: black;">
                            <select name="ingredient2_id" style="color: black;">
                                <option value="">---</option>
                                <?php
                                foreach ($ingredients as $ingredient) {
                                    echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                                }
                                ?>
                            </select>
                            <input type="number" name="ingredient2_weight" value="" style="color: black;">
                            <select name="ingredient3_id" style="color: black;">
                                <option value="">---</option>
                                <?php
                                foreach ($ingredients as $ingredient) {
                                    echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                                }
                                ?>
                            </select>
                            <input type="number" name="ingredient3_weight" value="" style="color: black;">
                            <select name="ingredient4_id" style="color: black;">
                                <option value="">---</option>
                                <?php
                                foreach ($ingredients as $ingredient) {
                                    echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                                }
                                ?>
                            </select>
                            <input type="number" name="ingredient4_weight" value="" style="color: black;">
                            <select name="ingredient5_id" style="color: black;">
                                <option value="">---</option>
                                <?php
                                foreach ($ingredients as $ingredient) {
                                    echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                                }
                                ?>
                            </select>
                            <input type="number" name="ingredient5_weight" value="" style="color: black;">

                            <div class="button-container">
                                <input type="submit" value="登録">
                            </div>
                        </form>
                        <br>

                            <form method="post" action="{{ route('training.store') }}">
                                @csrf
                                <p>トレーニングを登録 </p>
                                <input type="text" name="name" value="トレーニング名" style="color: black;">
                                <input type="number" name="calorie" value="１分間の消費カロリー" style="color: black;">
                                <div class="button-container">
                                    <input type="submit" value="登録">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</x-app-layout>