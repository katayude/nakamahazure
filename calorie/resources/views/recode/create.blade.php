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
    <?php
    $ingredients = ['卵', 'ご飯', '醤油'];
    ?>
    <div class="container">
        <h1> 今日の記録 </h1>
        <form method="post" action="">
            <p>食事を選択 </p>
            <select name="op">
                <option value="---">---</option>
                <!-- 以下の部分はfoodテーブルからデータを持ってくる必要があります -->
                <option value="Option A">Option A</option>
                <option value="Option B">Option B</option>
                <option value="Option C">Option C</option>
                <option value="Option D">Option D</option>
            </select>
            <br>
            <br>

            <p>トレーニングを選択 </p>
            <select name="op">
                <option value="---">---</option>
                <!-- 以下の部分はtrainingテーブルからデータを持ってくる必要があります -->
                <option value="Option A">Option A</option>
                <option value="Option B">Option B</option>
                <option value="Option C">Option C</option>
                <option value="Option D">Option D</option>
            </select>
            <label>
                <input type="number" name="training_minutes" value="">
                トレーニング時間(分)
            </label>

            <input type="submit" value="送信">
        </form>
        <br>

        <form method="post" action="">
            <p>食事を登録 </p>
            <input type="text" name="food_name" value="料理名">
            <select name="food_ingredients1">
                <option value="---">---</option>
                <?php
                foreach ($ingredients as $ingredient) {
                    echo '<option value="' . $ingredient . '">' . $ingredient . '</option>';
                }
                ?>
            </select>
            <input type="number" name="ingredients1_g" value="">
            <select name="food_ingredients2">
                <option value="---">---</option>
                <?php
                foreach ($ingredients as $ingredient) {
                    echo '<option value="' . $ingredient . '">' . $ingredient . '</option>';
                }
                ?>
            </select>
            <input type="number" name="ingredients2_g" value="">
            <select name="food_ingredients3">
                <option value="---">---</option>
                <?php
                foreach ($ingredients as $ingredient) {
                    echo '<option value="' . $ingredient . '">' . $ingredient . '</option>';
                }
                ?>
            </select>
            <input type="number" name="ingredients3_g" value="">
            <select name="food_ingredients4">
                <option value="---">---</option>
                <?php
                foreach ($ingredients as $ingredient) {
                    echo '<option value="' . $ingredient . '">' . $ingredient . '</option>';
                }
                ?>
            </select>
            <input type="number" name="ingredients4_g" value="">
            <select name="food_ingredients5">
                <option value="---">---</option>
                <?php
                foreach ($ingredients as $ingredient) {
                    echo '<option value="' . $ingredient . '">' . $ingredient . '</option>';
                }
                ?>
            </select>
            <input type="number" name="ingredients5_g" value="">

            <input type="submit" value="登録">
        </form>
        <br>

        <form method="post" action="">
            <p>トレーニングを登録 </p>
            <input type="text" name="training_name" value="トレーニング名">
            <input type="number" name="training_calorie" value="１分間の消費カロリー">
            <input type="submit" value="登録">
        </form>
    </div>
</body>


</html>