<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI結果</title>
    <style>
        div{
            padding:5px;
        }
        body{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        if (isset($_GET['height']) && isset($_GET['weight'])) {
            $height = $_GET['height'];
            $weight = $_GET['weight'];
        } else if (isset($_POST['height']) && isset($_POST['weight'])) {
            $height = $_POST['height'];
            $weight = $_POST['weight'];
        } else {
            echo "請使用正確管道進入此頁面!";
            // 後續都不會show在網頁上
            exit();
            // 也可以header/回首頁
        }
    ?>

     <!-- $_GET[name] 字串 -->
    <h1>BMI結果</h1>
    <!-- 體重（公斤）除以身高（公尺）的平方 -->
    <?php
        $h = $height/100;

        // 四捨五入 兩位數
        $bmi = round($weight/($h*$h),2);
    ?>
    <div>您的身高：<?=$height;?> 公分</div>
    <div>您的體重：<?=$weight;?> 公斤</div>
    <div>您的BMI為：<?=$bmi;?> </div>
    <!-- 
    體重過輕   BMI<18.5	 
    健康體位   18.5<=BMI<24	 
    體位異常   過重：24<=BMI<27
              輕度肥胖：27 <= BMI < 30
              中度肥胖：30 <= BMI < 35
              重度肥胖：BMI >= 35 
    -->
    <?php
        // switch($bmi){
        //     case $bmi>0 && $bmi<18.5:
        //         $level = "體重過輕";
        //     case $bmi>=18.5 && $bmi<24:
        //         $level = "健康體位";
        //         break;
        //     case $bmi>=24 && $bmi<27:
        //         $level = "體位異常 - 過重";
        //     case $bmi>=27 && $bmi<30:
        //         $level = "體位異常 - 輕度肥胖";
        //     case $bmi>=30 && $bmi<35:
        //         $level = "體位異常 - 中度肥胖";
        //     case $bmi>=35:
        //         $level = "體位異常 - 重度肥胖";
        // }
        if ($bmi < 18.5) {
            $level = '體重過輕';
        } elseif ($bmi < 24) {
            $level = "健康體位";
        } elseif ($bmi < 27) {
            $level = "體位異常 - 過重";
        } elseif ($bmi < 30) {
            $level = "體位異常 - 輕度肥胖";
        } elseif ($bmi < 35) {
            $level = "體位異常 - 中度肥胖";
        } else {
            $level = "體位異常 - 重度肥胖";
        }
    ?>
    <div>體位判定為：<?=$level;?></div>
    <div>
        <a href="bmi.php?bmi=<?=$bmi;?>">回首頁/重新測量</a>
    </div>
</body>
</html>