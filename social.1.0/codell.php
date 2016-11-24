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
$cid=$_POST['cid'];
$sql=mysql_query("SELECT * FROM comments WHERE id='$cid'");
while($com= mysql_fetch_array($sql))
  {
$tim=$com['time'];
$sid=$com['sid'];
$sql3="DELETE FROM notifs WHERE sid='$sid' AND time='$tim'";

if (!mysql_query($sql3,$con))
  {
  die('mysql Error: ' . mysql_error());
  }
}
$sql2="DELETE FROM comments WHERE id='$cid' AND uid='$uid'";

if (!mysql_query($sql2,$con))
  {
  die('mysql Error: ' . mysql_error());
  }
echo('This post has been deleted!');
if (!mysql_query($sql3,$con))
  {
  die('mysql Error: ' . mysql_error());
  }
}
?>