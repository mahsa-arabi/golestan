<?php
session_start();

if (isset($_SESSION['ID']) && isset($_SESSION['name'])) {

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
        <p id="welcome"> به سامانه گلستان خوش آمدید</p>
    </div>
</div>




</body>
    <?php
}else{
    header("Location: ../index.php");
    exit();
}
?>