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
        input[type=submit].grades_confirm,input[type=submit].grade_confirm{
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

        if (isset($_POST['course_confirm'])) {
        if (!empty($_POST['courseSelect'])) {
            $_SESSION['course_id'] = $_POST['courseSelect'];
        }

        ?>
        <form method="post">
            <table>
                <tr>
                    <th>شماره دانشجو</th>
                    <th>نام</th>
                    <th>نمره</th>
                </tr>
                <?php
                $course_id = $_SESSION['course_id'];
                $semester = $_SESSION['semester'];
                $year = $_SESSION['year'];
                $sql = "SELECT ID,name FROM student natural join takes WHERE course_id='$course_id' 
                                                 AND semester='$semester' AND year='$year'";
                $query = $conn->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $id = 1;
                if($query->rowCount() > 0){

                    foreach ($results as $result) {
                        ?>
                        <tr>
                            <form method="post">
                            <td> <?php echo htmlentities($result->ID) ?></td>
                            <td> <?php echo htmlentities($result->name) ?></td>

                                <td><input type="text" name="grade" maxlength=2 required></td>
                                <td>
                                    <?php
                                    $id=htmlentities($result->ID);
                                    ?>

                                    <input class="grade_confirm" type="submit" value="ثبت">
                                </td>
                            </form>
                        </tr>
                        <?php
                        $id++;
                    }}
                ?>
            </table>
            <div>
                <input class="grades_confirm" type="submit" value="ثبت اطلاعات">
            </div>

<?php } ?>
    </div>
</div>



</body>
