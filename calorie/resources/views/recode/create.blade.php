<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body>
    <div class="container">
        <h1> 今日の記録 </h1>
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
                    <option name = "training_name" value="{{ $training->name }}">{{ $training->name }}</option>
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
                <option value= "">---</option>
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
</body>


</html>
