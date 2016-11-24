<?php
include('config.php');
$cokie=$_COOKIE['iunv_sessid'];
$uid=$_COOKIE['iunv_id'];
$rex=1;
$sql = mysql_query("SELECT * FROM active WHERE id='$uid'");
while($auth= mysql_fetch_array($sql)){
$rex=$auth['cookie'];
}
if(!$rex==$cokie){
Header('Location: log-in');
exit();
}
else{
$sid=$_GET['sid'];
$time=$_GET['time'];
$sql = "UPDATE notifs SET seen='1' WHERE sid='$sid' AND time='$time'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$page= "story?sid=".$sid;
HEADER('Location: '.$page);
}

?>