<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <style>
    table {
        border-collapse:collapse;
    }
    td,th{
        padding:5px 10px;
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

    // 當月第一天
    $firstDay = strtotime("$year-$month-1");
    // $firstDayTime = strtotime($firstDay);
    // 當月第一天是週幾
    $firstDayWeek= date("w",$firstDay);
    // $firstDayWeek = date("w",strtotime(date("Y-m-1")));
    // 這個月有幾天
    $daysInMonth = date("t",$firstDay);
    // 這個月的最後一天
    $lastDayInMonth = strtotime(date("Y-$month-$daysInMonth"));

    $days=[];
    for ($i=0; $i <42; $i++) { 
        // 算出第一天在第幾格
        $diff=$i-$firstDayWeek;
        $days[]=date("Y-m-d",strtotime("$diff days",$firstDay));
    }
   

    if ($month-1 <1) {
        $prevMonth=12;
        $prevYear = $year-1;
    } else {
        $prevMonth = $month-1;
        $prevYear = $year;
    } 
    
    if ($month+1 >12) {
        $nextMonth = 1;
        $nextYear = $year+1;
    } else {
        $nextMonth = $month +1;
        $nextYear = $year;
    }
?>

<a href="calendar.php?year=<?=$year-1;?>&month=<?=$month;?>"> 去年 </a>
<a href="calendar.php?year=<?=$prevYear;?>&month=<?=$prevMonth;?>"> 上一個月 </a>
<a href="calendar.php?year=<?=date("y");?>&month=<?=date('m');?>"> 今天 </a>
<a href="calendar.php?year=<?=$nextYear;?>&month=<?=$nextMonth;?>"> 下一個月 </a>
<a href="calendar.php?year=<?=$year+1;?>&month=<?=$month;?>"> 明年 </a>

<table>
<?php
// 印月份 
$month = date('Y年-m月',$firstDay);
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
    foreach ($days as $day) {
        // 只get後面的月日
        $format = explode("-",$day)[2];
        // Numeric representation of the day of the week(0-6)
        $w = date("w",strtotime($day));
        // 印出的日期月份是否與現在的月份相同
        $theMonth = date("m",$theDayTime)==date("m")?"":"grey-text";
        // 印出的日期月份是否是今天
        $isToday = date("Y-m-d",$theDayTime)==date("Y-m-d")?"today":"";
        // 印出的日期月份是否是周末
        $isHoliday = ($w == 0 || $w == 6)?"holiday":"";
        $w=date("w",$theDayTime);
        echo "<td class = '$isHoliday $theMonth $isToday'>";
    }

?>
</table>
</body>
</html>