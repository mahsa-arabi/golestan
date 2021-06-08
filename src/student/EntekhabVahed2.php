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
    <?php
    require_once('stuStyle.php');
    ?>
    <style>
        .table {
            height: 15rem;
            overflow-y: auto;
            margin: 5%;
            border: solid;
            margin-bottom: 0;
        }
    </style>
</head>

<body>
<div id="page">
    <?php
    require_once("studentSideBar.php");
    ?>
    <div id="content"  style="overflow-y: auto">

        <div class="table">
            <table id="mytable">
                <thead>
                <th>نام درس</th>
                <th>تعداد واحد</th>
                <th>دانشکده</th>
                <th>حذف</th>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT title,credits,dept_name FROM course";
                $query = $conn->prepare($sql);
              $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);


                $id = 1;
                if ($query->rowCount() > 0) {

                    foreach ($results as $result) {
                        ?>
                        <tr>
                            <td>
                                <?php echo htmlentities($result->title) ?>
                            </td>
                            <td>
                                <?php echo htmlentities($result->credits) ?>
                            </td>
                            <td>
                                <?php echo htmlentities($result->dept_name) ?>
                            </td>

                            <td><a href="index.php?del=<?php echo htmlentities($result->id); ?>">
                                    <button onClick="return confirm('آیا حذف انجام شود');"></button>
                                </a></td>
                        </tr>
                        <?php
                        $id++;
                    }
                }
                ?>
                </tbody>
            </table>
        </div>


        <div class="table">
            <table id="mytable">
                <thead>
                <th>نام درس</th>
                <th>تعداد واحد</th>
                <th>دانشکده</th>
                <th>انتخاب</th>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT title,credits,dept_name,course_id FROM course";
                $query = $conn->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);


                $id = 1;
                if ($query->rowCount() > 0) {

                    foreach ($results as $result) {
                        ?>
                        <tr>
                            <td>
                                <?php echo htmlentities($result->title) ?>
                            </td>
                            <td>
                                <?php echo htmlentities($result->credits) ?>
                            </td>
                            <td>
                                <?php echo htmlentities($result->dept_name) ?>
                            </td>

                            <td><a href="index.php?del=<?php echo htmlentities($result->id); ?>">
                                    <button></button>
                                </a></td>
                        </tr>
                        <?php
                        $id++;
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <div style="display: flex; flex-direction:row; padding-bottom:6%;margin: 2% 4% 2%;">
            <input id="save" type="submit" value="اعمال تغییرات" >
            <button id="save" onclick="">ذخیره</button>
        </div>

    </div>
</div>
</body>
