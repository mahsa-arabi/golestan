<?php
if (isset($_POST['stu_submit'])) {
    require_once ('stuLogin.php');
}elseif (isset($_POST['instr_submit'])){
    require_once('instrLogin.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>گلستان</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://v1.fontapi.ir/css/Shabnam" rel="stylesheet">
    <style>
        input[type=submit]{
            color: lightpink !important;
            background-color: rebeccapurple !important;
            padding: 0.3rem !important;
            margin: 10%;
        }
        label{
            width: 100%;
            direction: rtl;
        }
        form{
            overflow-y: auto;
            margin: auto;
            width: 50%;
        }
        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 3px;
            width: 40%;
            border-radius: 5px;
            margin-top:2%;
            margin-bottom: 0;
        }
    </style>
</head>

<body>
<div id="page">
   
    <div id="content">
        

<div id="table">
    <?php if (isset($_GET['error'])) {
        $error=$_GET['error'];
        ?>
        <p class="error"><?php echo $error ?></p>
    <?php
    }
    ?>
<form method="post" action="">
    <div id="item">
    <label > آیدی :  </label>
    <input type="text" name="ID">
    </div>
   <div id="item">
   <label >نام : </label>
    <input type="text" name="name">
   </div>
   <div id="item">
   <input type="submit" name="stu_submit" value="ورود دانشجو">
    <input type="submit" name="instr_submit"  value="ورود استاد">
   </div>

</form>
</div>

    </div>
</div>





</body>