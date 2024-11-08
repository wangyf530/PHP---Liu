<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>資料庫連線</title>
    <style>
        *{
            box-sizing:border-box;
        }

        table{
            border-collapse:collapse;
            margin: auto;
            width: 400px;
        }
        
        table tr:nth-child(1) td{
            background-color: lightskyblue;
            color:darkorange;
            text-shadow: 2px 2px 2px #fff;
        }

        td{
            padding:5px 15px;
            text-align: center;
            border:1px solid black;
        }


    </style>
</head>
<body>
<h1>資料庫連線</h1>
<!-- public: index.php center.php shop.php -->
<?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=school";
    $pdo = new PDO($dsn, 'root', '');

    $sql = "select * from classes";

    $rows = $pdo -> query($sql) -> fetchALL(PDO::FETCH_ASSOC);
    // fetch可以一次一筆 也可以一次多筆
?>

<table>
    <tr>
        <td>序號</td>
        <td>班級名稱</td>
        <td>導師</td>
    </tr>
<?php
    foreach ($rows as $row) {
?>
    <tr>
        <td><?=$row['id'];?></td>
        <td> 
            <a href="classes_detail.php?class=<?=$row['id'];?>">
                <?=$row['name'];?>
            </a>
        </td>
        <td><?=$row['tutor'];?></td>
    </tr>
<?php
    }
?>

    <!-- echo "<pre>";
    print_r($rows);
    echo "</pre>"; -->

</table>

</body>
</html>