<?php
require_once '../dbConfig.php';

session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>گلستان</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://v1.fontapi.ir/css/Shabnam" rel="stylesheet">
</head>

<body>
<div id="page">
    <?php
    require_once("instructorSideBar.php");
    ?>
    <div id="content">
    <div id="table1">
<div id="tableheader">
    
    <span>تعداد واحد انتخاب شده:  5</span>
  
    <span>سقف واحد:  20</span>
    


</div>
<div id="tableheader">
    
        <span>نام درس</span>
    
        <span>تعداد واحد</span>
        <span>دانشکده</span>
    
    <span>زمان </span>
    <span>ظرفیت</span>
    
    <span>حذف</span>
    

    
</div>

<div id="tablebody">
    سلام

</div>
</div>


<div id="table1">
<div id="tableheader">
    
    <span>درس های موجود   </span>
    


</div>
<div id="tableheader">
    
        <span>نام درس</span>
    
        <span>تعداد واحد</span>
        <span>دانشکده</span>
    
    <span>زمان </span>
    <span>ظرفیت</span>
    <span>وضعیت </span>
    <span>انتخاب</span>
    

    
</div>

<div id="tablebody">
    سلام

</div>
</div>

    </div>
</div>





</body>