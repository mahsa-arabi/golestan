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
        <div id="karnamehead">
            <p> ترم : <span><?php  echo $semester ." " .date("Y"); ?></span></p>
        </div>

<div id="table">
<div id="tableheader">
    
        <span>نام درس</span>
    
    
        <span>نام استاد</span>
    
        <span>تعداد واحد</span>
    
    <span>نمره </span>
    
</div>

<div id="tablebody">
    سلام

</div>
</div>

    </div>
</div>





</body>