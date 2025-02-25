<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>計算BMI</title>
    <style>
        input[type='number'] {
            width: 100px;
        }
        div{
            padding:5px;
        }
        .menu{
            text-align: right;
        }
    </style>
</head>
<body>
    <div class = "menu">
        <a href="index.html">回首頁</a>
    </div>
    <?php
    // 是否有量過
    if(isset($_GET['bmi'])) {
        echo "您上一次量過的BMI為{$_GET['bmi']}";
    }
    ?>

    <h1>計算BMI - GET</h1>
    <!-- 
        GET的話就是點擊'計算'後 頁面後綴會有 ?height=xxx&weight=xxx 
        POST的話點擊'計算'後只有 http://localhost/result.php
        -->
        <form action="result.php" method="get">
            <div>
                <label for="height">身高：</label>
                <input type="number" name="height" id="height" min="1" max="250" step=0.1> cm
            </div>
            <div>
                <label for="weight">體重：</label>
                <input type="number" name="weight" id="weight" min="1" max="500" step=0.1 > kg
            </div>
            <div>
                <!-- input:submit+input:reset -->
                <input type="submit" value="計算">
                <input type="reset" value="清空/重置">
            </div>
        </form>
        
    <h1>計算BMI - POST</h1>
    <form action="result.php" method="post">
        <div>
            <label for="height">身高：</label>
            <input type="number" name="height" id="height" min="1" max="250" step=0.1> cm
        </div>
        <div>
            <label for="weight">體重：</label>
            <input type="number" name="weight" id="weight" min="1" max="500" step=0.1 > kg
        </div>
        <div>
            <!-- input:submit+input:reset -->
            <input type="submit" value="計算">
            <input type="reset" value="清空/重置">
        </div>
    </form>
</body>
</html>