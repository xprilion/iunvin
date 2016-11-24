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
$sid=$_POST['sid'];
$sql2="DELETE FROM streams WHERE id='$sid' AND uid='$uid'";

if (!mysql_query($sql2,$con))
  {
  die('mysql Error: ' . mysql_error());
  }

echo('This post has been deleted!');
$sql3="DELETE FROM uploads WHERE sid='$sid'";

if (!mysql_query($sql3,$con))
  {
  die('mysql Error: ' . mysql_error());
  }
}
?>