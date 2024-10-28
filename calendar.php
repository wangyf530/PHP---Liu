<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <style>
    table {
        border-collapse:collapse;
        margin:auto;
        width:300px;
    }
    td,th{
        /* padding:5px 10px; */
        text-align: center;
        border:1px solid #999;
    }

    .holiday{
        background: pink;
        color: red;
    }

    .grey-text{
        color:#999;
    }

    .today{
        background: blue;
        color: white;
        font-weight: bolder;
    }

    .clicks{
        font-size:18px;
        border:2px solid black;
        margin: auto;
        text-align: center;
        width:300px;
        background: lightgrey;
    }

    a{
        padding:3px;
    }
    a:hover{
        background:black;
        color:white;
    }


    </style>
</head>

<body>
    <h1>萬年曆</h1>

    <h3>線上月曆製作</h3>
<ul>
    <li>以月為單位來顯示一個月中的日期</li>
    <li>有上一個月，下一個月的連結來切換月份</li>
    <li>可以不同的顏色或樣式來強調當日或周末</li>
    <li>有上一個月下一個月的按鈕</li>
    <li>萬年曆都在同一個頁面同一個檔案</li>
</ul>
<?php
    // 如果有參數就按照參數來 沒有的話就用當前年月份
    if (isset($_GET['month'])) {
        $month = $_GET['month'];
    } else {
        $month = date("m");
    }
    if (isset($_GET['year'])) {
        $year = $_GET['year'];
    } else {
        $year = date("Y");
    }
   
    // 一月份的上一個月會是去年的12月
    if ($month-1 <1) {
        $prevMonth=12;
        $prevYear = $year-1;
    // 其他月份的上一個月就是同一年的前一個月
    } else {
        $prevMonth = $month-1;
        $prevYear = $year;
    } 
    // 12月份的下一個月會是明年的1月
    if ($month+1 >12) {
        $nextMonth = 1;
        $nextYear = $year+1;
    // 其他月份的下一個月就是同一年的後一個月
    } else {
        $nextMonth = $month +1;
        $nextYear = $year;
    }
?>
<div class='clicks'>
    <!-- 連結前往去年、上一個月、今天、下一個月、以及明年 -->
    <a href="calendar.php?year=<?=$year-1;?>&month=<?=$month;?>"> 去年 </a>
    <a href="calendar.php?year=<?=$prevYear;?>&month=<?=$prevMonth;?>"> 上一個月 </a>
    <a href="calendar.php?year=<?=date("Y");?>&month=<?=date('m');?>"> 今天 </a>
    <a href="calendar.php?year=<?=$nextYear;?>&month=<?=$nextMonth;?>"> 下一個月 </a>
    <a href="calendar.php?year=<?=$year+1;?>&month=<?=$month;?>"> 明年 </a>
</div>

<!-- 萬年曆的表格 -->
<table>
<?php
    // 當月第一天
    $firstInMonth = "$year-$month-1";
    $firstDayTime = strtotime($firstInMonth);
    // 當月第一天是週幾
    $firstDayWeek= date("w",$firstDayTime);
    // $firstDayWeek = date("w",strtotime(date("Y-m-1")));


    // 印月份 
    $month = date('Y年-m月',$firstDayTime);
    echo "<tr> <td colspan=8>".$month."</td>";
    // 印週幾
    $day=[' ','日','一','二','三','四','五','六'];
    echo "<tr>";
    foreach ($day as $key) {
        if ($key=='日' || $key =='六'){
            echo "<td class='holiday'> $key </td>";
        } else {
        echo "<td> $key </td>";
        }
    }
    echo "</tr>";


    // 印日期 
    for ($i=0; $i<6; $i++) { 
        echo "<tr>";
        // 印第幾周
        echo "<td>";
        echo $i+1;
        echo "</td>";

        for ($j=0; $j<7; $j++) { 
            // 幾號 當月第一天會是0
            $cell = $i*7 + $j - $firstDayWeek;
            // 當月第一天的日期
            $theDayTime = strtotime("$cell days".$firstInMonth);

            // 不是當月的話字會變灰
            $theMonth = (date("m",$theDayTime) == date("m",$firstDayTime))?'':'grey-text';
            // 是今天的話就高亮
            $isToday = (date("Y-m-d",$theDayTime) == date("Y-m-d"))?'today':'';
            // 判斷當天是否是週末
            $w = date("w",$theDayTime);
            $isHoliday = ($w==6 || $w==0)?'holiday':'';
            echo "<td class = '$theMonth $isToday $isHoliday'>";
            echo date('d',$theDayTime);
            echo "</td>";
        }
        echo "</tr>";
    }

?>
</table>
</body>
</html>