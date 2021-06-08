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
   
    function save($item,$semester,$year,$conn){
        $id=$_SESSION['ID'];
       
        foreach($item as $c_id){
            $sql = 'INSERT INTO takes VALUES(:id,:c_id,:s_id,:semester,:year)';
            $statement = $conn->prepare($sql);

            $statement->execute([
                ':id' => $id,
                ':c_id'=>$c_id,
                ':s_id'=>$c_id,
                ':semester'=>$semester,
                ':year'=>$year
            ]);
        }
    }
        
    function setSelected($Selected){
        
      if(isset($_POST['course'])){
        $added = $_POST['course'];
        if(isset($_POST['delete'])){
            $deleted = $_POST['delete'];
            if (!empty($added)) {
               if (!empty($deleted)) {
                $n=count($added);
                for($i=0;$i<$n;$i++){
                    foreach ($deleted as $d) {
                        if ($added[$i] === $d) {
                           array_slice($added,$i,1);
                        }
                    }
                }
      }
            }
        }   
         $Selected= $Selected + $added;
        return $Selected + $added;
             
    }
     else{
         if (isset($_POST['delete'])) {
            $deleted = $_POST['delete'];
            $n=count($Selected);
             for($i=0;$i<$n;$i++){
                 foreach ($deleted as $d) {
                     if ($Selected[$i] === $d) {
                        array_slice($Selected,$i,1);
                     }
                 }
             }
         }
         return $Selected;
     }
 }
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
                <form method="POST">
                <?php
                
                $_SESSION['item']=setSelected($_SESSION['item']);
                 foreach ($_SESSION['item'] as $id) {

                    $sql = "SELECT title,credits,dept_name,course_id FROM course WHERE course_id='$id'";
                    $query = $conn->query($sql);
                    $results = $query->fetchAll(PDO::FETCH_ASSOC);
                    if ($results) {
                       
                    foreach ($results as $result) {
                        ?>
                        <tr>
                        <td>
                                <?php echo $result['title']; ?>
                            </td>
                            <td>
                                <?php echo $result['credits']; ?>
                            </td>
                            <td>
                                <?php echo $result['dept_name']; ?>
                            </td>

                            <td>
                                    <button onClick="return confirm('آیا حذف انجام شود');">
                                    <input type="checkbox" name='delete[]' value=<?php echo $result['course_id']; ?>>
                                    </button>
                                </td>
                        </tr>
                        <?php
                       
                    }
                }}
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
                require_once("../utility/findCurrentSemester.php");
                $semester =$_SESSION['semester'];
                $year=$_SESSION['year'];
               $sql = "SELECT title,credits,dept_name,course_id FROM course WHERE course_id IN
  (SELECT course_id FROM teaches WHERE semester='$semester' AND year='$year' )";
               $query = $conn->query($sql);
               $results = $query->fetchAll(PDO::FETCH_ASSOC);
               if ($results) {
                    foreach ($results as $result) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $result['title']; ?>
                            </td>
                            <td>
                                <?php echo $result['credits']; ?>
                            </td>
                            <td>
                                <?php echo $result['dept_name']; ?>
                            </td>

                            <td>
                                    <button>
                                    <input type="checkbox" name='course[]' value=<?php echo $result['course_id']; ?>>
                                    </button>
                            </td>
                        </tr>
                        <?php
                       
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <div style="display: flex; flex-direction:row; padding-bottom:6%;margin: 2% 4% 2%;">
            <input id="save" name="submit"  type="submit" value="اعمال تغییرات">
            <button id="save" onClick=<?php save($_SESSION['item'],$semester,$year,$conn) ?> >ذخیره</button>
            
        </div>
    </form>
    </div>
</div>
</body>
