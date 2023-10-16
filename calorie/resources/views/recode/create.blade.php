<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('今日の記録') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <form method="post" action="{{ route('daily.store') }}">
                        @csrf
                        <p>食事を選択 </p>
                        <select name="food_name">
                            <option value="---">---</option>
                            <!-- 以下の部分はfoodテーブルからデータを持ってくる必要があります -->
                            @foreach ($foods as $food)
                                <option name = "food_name" value="{{ $food->name }}">{{ $food->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        @csrf
                        <p>トレーニングを選択 </p>
                        <select name="training_name">
                            <option value="---">---</option>
                            <!-- 以下の部分はtrainingテーブルからデータを持ってくる必要があります -->
                            @foreach ($trainings as $training)
                                <option name="training_name" value="{{ $training->name }}">{{ $training->name }}</option>
                            @endforeach
                        </select>
                        <label>
                            <input type="number" name="training_minutes" value="">
                            トレーニング時間(分)
                        </label>

                        <input type="submit" value="送信">
                    </form>
                    <br>

                    <form method="post" action="{{ route('food.store') }}">
                        @csrf
                        <p>食事を登録 </p>
                        <input type="text" name="name" value="料理名">
                        <select name="ingredient1_id">
                            <option value="">---</option>
                            <?php
                            foreach ($ingredients as $ingredient) {
                                echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                            }
                            ?>
                        </select>
                        <input type="number" name="ingredient1_weight" value="">
                        <select name="ingredient2_id">
                            <option value="">---</option>
                            <?php
                            foreach ($ingredients as $ingredient) {
                                echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                            }
                            ?>
                        </select>
                        <input type="number" name="ingredient2_weight" value="">
                        <select name="ingredient3_id">
                            <option value="">---</option>
                            <?php
                            foreach ($ingredients as $ingredient) {
                                echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                            }
                            ?>
                        </select>
                        <input type="number" name="ingredient3_weight" value="">
                        <select name="ingredient4_id">
                            <option value="">---</option>
                            <?php
                            foreach ($ingredients as $ingredient) {
                                echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                            }
                            ?>
                        </select>
                        <input type="number" name="ingredient4_weight" value="">
                        <select name="ingredient5_id">
                            <option value="">---</option>
                            <?php
                            foreach ($ingredients as $ingredient) {
                                echo '<option value="' . $ingredient->id . '">' . $ingredient->name . '</option>';
                            }
                            ?>
                        </select>
                        <input type="number" name="ingredient5_weight" value="">

                        <input type="submit" value="登録">
                    </form>
                    <br>

                        <form method="post" action="{{ route('training.store') }}">
                            @csrf
                            <p>トレーニングを登録 </p>
                            <input type="text" name="name" value="トレーニング名">
                            <input type="number" name="calorie" value="１分間の消費カロリー">
                            <input type="submit" value="登録">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>