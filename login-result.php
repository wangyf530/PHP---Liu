<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入結果</title>
    <style>
        div{
            padding:5px;
        }
    </style>
</head>
<body>
    <?php
        $corUsername='123';
        $corPassword='abc';

        $acc = $_POST['acc'];
        $pw = $_POST['pw'];

        // $result = ($corUsername==$username && $corPassword==$password)?"輸入正確，登入成功":"輸入錯誤，登入失敗";

        if ($corUsername==$acc && $corPassword==$pw) {
            echo "輸入正確，登入成功";
        } else {
            echo "輸入錯誤，登入失敗";
            echo '<div><a href="login.php">重新輸入</a></div>';
        }
    ?>
    
</body>
</html>