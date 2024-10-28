<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入頁面</title>
    <style>
        div{
            padding:5px;
            text-align: center;
        }

        .menu{
            text-align: right;
        }

        fieldset{
            width:50%;
            margin:auto;
        }
        legend{
            color:blue;
            background:lightblue;
            text-align: center;
            width: 20%;
        }
        label{
            background:blue;
            color:white;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class = "menu">
        <a href="index.html">回首頁</a>
    </div>
    <h1>登入檢查
</h1>
    <ul>
        <li>建立一個可以輸入帳號和密碼的表單畫面</li>
        <li>輸入帳號密碼，按下"登入"按鈕後，在另一個頁面顯示帳號密碼是否正確。</li>
    </ul>
<fieldset>
    <legend> 登入檢查 </legend>
    <form action="login-result.php" method="post">
        <div>
            <input type="text" name="acc" id="acc" placeholder="使用者名稱" required>    
        </div>
        
        <div>
            <input type="password" name="pw" id="pw" placeholder="密碼" required>
        </div>
        
        <div>
            <input type="submit" value="登入">
            <input type="reset" value="重置">
        </div>
    </form>
</fieldset>
</body>
</html>