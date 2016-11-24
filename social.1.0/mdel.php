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
$mid=$_GET['mid'];

$sql3="UPDATE messages SET type='4' WHERE uid='$uid' AND id='$mid'";

if (!mysql_query($sql3,$con))
  {
  die('mysql Error: ' . mysql_error());
  }
echo('This message has been moved to trash!');
}
?>