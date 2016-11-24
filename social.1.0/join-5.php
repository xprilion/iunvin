<?php

include('config.php');
if(!isset($_COOKIE['iunv_signup'])){
echo('<META HTTP-EQUIV="refresh" CONTENT="0; logout">');
}
else{
$uname=$_COOKIE['iunv_uname'];
$uid=$_COOKIE['iunv_id'];
$sql = "UPDATE account SET
 likes= '$_POST[likes]',
 dislikes = '$_POST[dislikes]',
 onlyme = '$_POST[onlyme]', 
 profession= '$_POST[profession]'
WHERE username = '$uname'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$time=time();
$suggestion=$_POST['suggestions'];
$type=1;
$sql2 = "INSERT INTO feedback(uid, suggestion, type, time) VALUES ('$uid', '$suggestion', '$type', '$time')";
if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
echo('<META HTTP-EQUIV="refresh" CONTENT="0; dashboard">');
}
?>