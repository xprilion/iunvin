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
$sug=$_POST['sug'];
$uid=$_COOKIE['iunv_id'];
$type=2;
$time=time();

$sql2="INSERT INTO feedback(uid, suggestion, time, type)
VALUES
('$uid','$sug','$time', $type)";

if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }

echo('Thankyou for your feedback! We will see to it soon!<br>You are entered for a reward to 100 coins at iunv.market!');
}
?>