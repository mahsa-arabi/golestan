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
<?php
require_once ('stuStyle.php');
?>
<body>
<div id="page">
    <?php
    require_once("studentSideBar.php");
    ?>
    <div id="content" style="overflow-y: auto">
        <?php
          require_once("../utility/findCurrentSemester.php");
        ?>
        <div id="karnameHeader">
            <p> ترم : <span><?php  echo $semester ." " .date("Y"); ?></span></p>
        </div>
        <hr/>
        <div>
            <table>
                <tr>
                    <th>کد درس</th>
                    <th>نام درس</th>
                    <th>تعداد واحد</th>
                    <th>نام دپارتمان</th>
                    <th>نمره</th>
                </tr>
                <?php
                $ID=$_SESSION['ID'];
                $year=$_SESSION['year'];
                $semester=$_SESSION['semester'];
                $sql = "SELECT course_id,title,credits,dept_name,grade FROM course natural join takes
                        WHERE ID='$ID' AND year='$year' AND semester='$semester'";
                $query = $conn->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $id = 1;
                if($query->rowCount() > 0){

                    foreach ($results as $result) {
                        ?>
                        <tr>
                            <td> <?php echo htmlentities($result->course_id) ?></td>
                            <td> <?php echo htmlentities($result->title) ?></td>
                            <td> <?php echo htmlentities($result->credits) ?></td>
                            <td> <?php echo htmlentities($result->dept_name) ?></td>
                            <td> <?php echo htmlentities($result->grade) ?></td>
                        </tr>
                        <?php
                        $id++;
                    }}
                ?>
            </table>
        </div>
</div>

    </div>
</div>





</body>