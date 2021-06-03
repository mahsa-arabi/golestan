<?php
require_once '../dbConfig.php';
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
    require_once("studentSideBar.php");
    ?>
    <div id="content">
        <?php
          require_once("../utility/findCurrentSemester.php");
        ?>
       
        
<div id="table">
<div id="tablebody">
<span>:نام </span>
    
    
    <span>:نام خانوادگی</span>

    <span>:دانشکده</span>
    <span>ترم:<?php  echo $semester ." " .date("Y"); ?></span>

<span>:تعداد واحد گذرانده </span>

</div>
</div>

    </div>
</div>





</body>