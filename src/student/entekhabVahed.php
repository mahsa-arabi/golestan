<?php

require_once 'C:\xampp\htdocs\golestan\src\dbConfig.php';

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
      #content {
    display: flex;
    flex-direction: column;
    background-color: lightpink;
    flex: 1 0 auto;
    color: slateblue;
    /* enable grow, disable shrink */
}
       #table1{
    display: flex;
    flex-direction: column;
    overflow:scroll;
    align-items: center;
    width: 90%;
    height: 40%;
    background-color: slateblue;
    color: lightpink;
    border: #bbb 3px;
    margin-right: 5%;
    margin-top:5%;
    padding-right: 4%;
}
#tableheader{
    background-color: slateblue;
    color: lightpink;
    width: 100%;
    height: 60px;
    padding-top: 25px;
}
#tr{
  height: 40px;
}
#tr-h{
  height: 40px;
  font-size: 22;
  color: white;
 
}

#tablebody{
    display: flex;
    flex-direction:column;
    justify-content: space-between;
    width: 90%;
  overflow:scroll;
    padding:4% 4% 4% 4% ;
    background-color: slateblue;
    color: lightpink;
    align-items: center;
}
#save{
      color: lightpink;
    background-color: rebeccapurple;
    padding: 0.5rem !important;
    text-align: center;
   margin-top: 3%;
   margin-right: 5%;
   margin-left: 3%;
   margin-bottom: 3%;
    width: 10%;
    height: 60px;
}
    </style>
</head>

<body>
<div id="page">
    <?php
    require_once("studentSideBar.php");

   
    ?>
    <div id="content">
    <div id="table1">
    
<table style="width:100%">
  <tr id="tr-h" >
    <th>نام درس</th>
    <th>تعداد واحد</th>
    <th>دانشکده</th>
    <th>حذف</th>
  </tr>
  <form method="POST">
  <?php
  
  $selected = $_POST['course'];
  $deleted=$_POST['delete'];
  if(!empty($selected)) 
  {
    if(!empty($deleted)){
      foreach($selected as $s){
        foreach($deleted as $d){
          if($s==$d){
            unset($s);
          }
        }
      }
    }
    $N = count($selected);
    foreach($selected as $id)
    {
   
      $sql = "SELECT title,credits,dept_name,course_id FROM course WHERE course_id='$id'";
      $query = $conn->query($sql);
   $result =$query->fetchAll(PDO::FETCH_ASSOC);
   if ($result) {
     foreach($result as $i) {
       echo "<tr id='tr' >"."<td>" . $i['title']."</td>"."<td>" . $i['credits']."</td>"."<td>" . $i['dept_name']."</td>";
       ?>
 <th>
  <input type="checkbox" name='delete[]' value=<?php echo $i['course_id'] ?>>
</th>
</tr>
<?php
} 
}
}
}
 

  ?>
</table>
</div>

    <div id="table1">
<table style="width:100%">
  <tr id="tr-h" >
    <th>نام درس</th>
    <th>تعداد واحد</th>
    <th>دانشکده</th>
    <th>انتخاب</th>
  </tr>
 
  <?php
  function select($id){
    echo $id;
  }
  
  $semester="Spring";
  $year="2017";
  $sql = "SELECT title,credits,dept_name,course_id FROM course WHERE course_id IN
   (SELECT course_id FROM teaches WHERE semester='$semester' AND year='$year' )";
  $query = $conn->query($sql);
  $result =$query->fetchAll(PDO::FETCH_ASSOC);
  if ($result) {
    foreach($result as $i) {
        
      echo "<tr id='tr' >"."<td>" . $i['title']."</td>"."<td>" . $i['credits']."</td>"."<td>" . $i['dept_name']."</td>";
    ?>
<th >
<input type="checkbox" name='course[]' value=<?php echo $i['course_id'] ?> >
</th>
    </tr>
    <?php
    }
  } 
 

  ?>
</table>
</div>

<div style="display: flex; flex-direction:row; padding-bottom:6%;">
<input id="save" type="submit" value="اعمال">
<button id="save" onclick="">ذخیره</button>
</div>
</form>
</div>

</div>
</body>




