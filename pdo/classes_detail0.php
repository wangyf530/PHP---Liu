<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[班級]詳細資料</title>
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
    <h1>班級學員</h1>
    <!-- show班級所有學生資料 -->
    <!-- classes -> class_student -> students -->
    <?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=school";
    $pdo = new PDO($dsn, 'root', '');

    $class = $_GET['class'];
    $sql = "SELECT `classes`.`code` AS 'classCode',`classes`.`name` AS 'class',`class_student`.`school_num` AS 'schoolID', `students`.`name` AS 'name', `students`.`birthday` AS 'birthday'
            FROM `classes`,`class_student`,`students`
            WHERE `classes`.`code`=`class_student`.`class_code` && `class_student`.`school_num`=`students`.`school_num`
            HAVING `classes`.`code`= '$class';";

    $rows = $pdo -> query($sql) -> fetchALL(PDO::FETCH_ASSOC);

    
    // echo "<pre>";
    // print_r($rows);
    // echo "</pre>";
?>

<table>
    <tr>
        <td>班級</td>
        <td>學號</td>
        <td>姓名</td>
        <td>生日</td>
    </tr>
<?php
    foreach ($rows as $row) {
?>
    <tr>
        <td><?=$row['class'];?></td>
        <td><?=$row['schoolID'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['birthday'];?></td>
    </tr>
<?php
    }
?>
</table>
</body>
</html>