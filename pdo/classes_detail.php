<?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=school";
    $pdo = new PDO($dsn, 'root', '');
    // get id of class we clicked
    $class_id = $_GET['class'];

    $class_sql = "SELECT * FROM classes WHERE id='$class_id'";
    
    $class = $pdo -> query($class_sql) -> fetch(PDO::FETCH_ASSOC);

    // $class['code'];
    // print_r($class);
    // echo $class_sql;
    // $sql = "SELECT * FROM classes";
    // $rows = $pdo -> query($sql) -> fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$class['name'];?>[班級]詳細資料</title>
    <style>
        *{
            box-sizing:border-box;
            text-align: center;
        }

        table{
            border-collapse:collapse;
            margin: auto;
            width: 50%;
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
<h1><?=$class['name'];?> &nbsp 班級學員</h1>
<h2>班級導師 - <?=$class['tutor'];?></h2>

<?php
    $class_members = "SELECT school_num, seat_num FROM class_student WHERE class_code='{$class['code']}'";
    $members = $pdo -> query($class_members) -> fetchALL(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
    <?php
        for ($i=0; $i<4; $i++) { 
    ?>
        <td>座號</td>
        <td>學號</td>
        <td>姓名</td>
    <?php
        }
    ?>
    </tr>
    
<?php
    foreach ($members as $idx => $mem) {
        $student_sql = "SELECT * FROM students WHERE school_num = '{$mem['school_num']}'";
        $student = $pdo -> query($student_sql) -> fetch(PDO::FETCH_ASSOC);
?>

    <?=($idx%4==0)?"<tr>":"";?>
    <td><?=$mem['seat_num'];?></td>
    <td><?=$student['school_num'];?></td>
    <td><?=$student['name'];?></td>
    <?=($idx%4==3)?"</tr>":"";?>
<?php
    }
?>
</body>
</html>