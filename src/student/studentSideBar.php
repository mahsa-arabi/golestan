
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://v1.fontapi.ir/css/Shabnam" rel="stylesheet">
</head>
<body>
<div id="sideBar">
    <div id="headerContainer">
        <p> <?php echo $_SESSION['name'] ?></p>
        <button><a href="informationStudent.php">مشاهده اطلاعات</a></button>
    </div>
    <hr/>
    <ul>
        <li><a href="studentLessons.php">مشاهده درس های گذرانده</a></li>
        <hr/>
        <li><a href="EntekhabVahed2.php">انتخاب واحد</a></li>
        <hr/>
        <li><a href="karname.php">مشاهده کارنامه</a></li>
        <hr/>

        <div style="position: relative">
            <div style="position: fixed; bottom: 0; width: 20%">
                <hr/>
                <li><a href="../logout.php">خروج</a></li>
            </div>

        </div>

    </ul>
</div>
</body>
</html>
