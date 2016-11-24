<?php
include('config.php');error_reporting(0);
$cokie=$_COOKIE['iunv_sessid'];
$uid=$_COOKIE['iunv_id'];
$rex=1;
$sql = mysql_query("SELECT * FROM active WHERE id='$uid'");
while($auth= mysql_fetch_array($sql)){
$rex=$auth['cookie'];
}
if(!$rex==$cokie){
echo('<li>Sorry! You must<a href="login"> Login </a>for this!</li>');
}
else{
$key=$_POST['s'];
$sql = mysql_query("SELECT * FROM `account` WHERE `fullname` LIKE '%$key%' LIMIT 5");
while($peo=mysql_fetch_array($sql)){
$pname=$peo['fullname'];
$puname=$peo['username'];
echo('<a href="profile?p='.$puname.'"><li>'.$pname.'</li></a>');
}
}
?>