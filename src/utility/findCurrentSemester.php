<?php
$semester=null;

if (3<= intval(date("m")) && intval(date("m")) <=5){
    $semester='Spring';
}elseif (6<= intval(date("m")) && intval(date("m")) <=8){
    $semester='Summer';
}elseif (9<= intval(date("m")) && intval(date("m")) <=11) {
    $semester = 'Fall';
}else{
    $semester=null;
}
  $_SESSION['semester']=$semester;
  $_SESSION['year']=date("Y");
?>