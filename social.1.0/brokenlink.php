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
$link=$_POST['link'];
$type=1;
$time=time();

$sql2="INSERT INTO feedback(uid, suggestion, time, type)
VALUES
('$uid','$link','$time', $type)";

if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
echo('Thankyou for your feedback! We will sort it out soon!<br>You are entered for a reward to 100 coins at iunv.market!');
}
?>