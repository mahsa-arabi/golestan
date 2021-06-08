<?php
require_once '../dbConfig.php';
session_start();
if (isset($_POST['grades_confirm'])) {
//    for ($i=0;$i<=$_SESSION['count'];$i++)
//      var_dump($_POST['grade'.$i]);
//    var_dump($_SESSION['grade-array']);
    $results=$_SESSION['grade-array'];
    $i=0;
    $grade = $_POST['grade'.$i];
    $semester=$_SESSION['semester'];
    $year=$_SESSION['year'];
    $course_id=$_SESSION['course_id'];
    $ID="";
foreach ($results as $result) {
    $grade = $_POST['grade'.$i];
    $ID=htmlentities($result->ID);
    $sql2 = "UPDATE `takes` SET `grade` ='$grade' WHERE `takes`.`ID` = '$ID' AND `takes`.`course_id` = '$course_id' AND `takes`.`semester` = '$semester' AND
                                          CONCAT(`takes`.`year`) = '$year';";

    $query2 = $conn->prepare($sql2);
    $query2->execute();

    $i++;
}

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
                $teachesID = $_SESSION['ID'];
                $sql0 = "SELECT ID FROM teaches WHERE ID='$teachesID' AND course_id='$course_id'
                                                 AND semester='$semester' AND year='$year'";
                $query0 = $conn->prepare($sql0);
                $query0->execute();
                $results = $query0->fetchAll(PDO::FETCH_OBJ);
                $id = 1;
                if($query0->rowCount() > 0){
                    $sql = "SELECT S.ID,S.name FROM takes natural join student as S WHERE course_id='$course_id'
                                                 AND semester='$semester' AND year='$year' AND grade=''";

                    $query = $conn->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $id = 1;
                    $temp=0;
                    $_SESSION['grade-array']=$results;
                    if($query->rowCount() > 0){
                        foreach ($results as $result) {
                            ?>
                            <tr>

                                    <td> <?php echo htmlentities($result->ID) ?></td>
                                    <td> <?php echo htmlentities($result->name) ?></td>

                                    <td><input type="text" name="<?php echo "grade".$temp?>" maxlength=2 required></td>
                                <?php $temp++; ?>
                                    <td>
                                        <?php
                                        $id=htmlentities($result->ID);
                                        ?>
                                    </td>

                            </tr>
                            <?php
                            $id++;
                        } }else{ echo "دانشجویی در این کلاس نیست یا عمل نمره دهی را قبلا انجام داده اید"; ?> <br><br> <?php }
                    $_SESSION['count']=$temp-1;
                }else{ echo "دانشجویی در این کلاس نیست یا عمل نمره دهی را قبلا انجام داده اید"; ?> <br><br> <?php }
                ?>
            </table>
            <div>
                <input class="grades_confirm" name="grades_confirm" type="submit" value="ثبت اطلاعات"
                       onClick="return confirm('آیا از ثبت اطلاعات مطمئن هستید؟');">
            </div>
        </form>
<?php } ?>
    </div>
</div>



</body>
