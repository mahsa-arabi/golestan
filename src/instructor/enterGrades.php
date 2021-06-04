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
    <style>
        input[type=submit]{
            color: lightpink !important;
            background-color: rebeccapurple !important;
            padding: 0.3rem !important;
            margin-right: 1%!important;
        }
        input[type=submit].confirm{
            margin: 2% 7.3% !important;
        }
        form{
            margin: 1% 1%;
        }
        table {
            border-collapse: collapse;
            width: 85%;
            margin-right: auto;
            margin-left:auto ;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>

<body>
<div id="page">
    <?php
    require_once("instructorSideBar.php");
    ?>
    <div id="content" style="overflow-y: auto;">
        <?php
        require_once("enterGradeHeader.php");
        ?>
        <form method="post">
            <table>
                <tr>
                    <th>شماره دانشجو</th>
                    <th>نام</th>
                    <th>نمره</th>
                </tr>
                <?php
                $sql = "SELECT ID,name FROM student";
                $query = $conn->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $id = 1;
                if($query->rowCount() > 0){

                    foreach ($results as $result) {
                        ?>
                        <tr>
                            <td> <?php echo htmlentities($result->ID) ?></td>
                            <td> <?php echo htmlentities($result->name) ?></td>
                            <td><input type="number" name="grade" max=20 min=0></td>
                        </tr>
                        <?php
                        $id++;
                    }}
                ?>
            </table>
            <div>
                <input class="confirm" type="submit" value="ثبت اطلاعات">
            </div>

        </form>

    </div>
</div>





</body>
