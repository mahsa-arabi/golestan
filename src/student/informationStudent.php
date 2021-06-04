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
    require_once("studentSideBar.php");
    ?>
    <div id="content">
        <?php
          require_once("../utility/findCurrentSemester.php");
        ?>
       
        
<div id="table">
<div id="tablebody">
    <span>ترم : <?php  echo $semester ." " .date("Y"); ?></span>
    <span> نام : <?php echo $_SESSION['name'] ?></span>
    <span> آیدی : <?php echo $_SESSION['ID'] ?></span>
    <span> نام دپارتمان : <?php echo $_SESSION['dept_name'] ?></span>
    <span> تعداد واحدهای گذرانده : <?php echo $_SESSION['tot_cred'] ?></span>

</div>
</div>

    </div>
</div>





</body>