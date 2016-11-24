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
$fid=$_POST['fid'];
error_reporting(0);
if(!isset($fid)){
echo('value??');
}
else{
if($fid==$uid){
echo('Sorry You Cant do that!');
}
else{
$sql = "SELECT * FROM friends WHERE uid = '$uid' AND fid='$fid'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
if(!mysql_num_rows($result)){
$time=time();
$sql="INSERT INTO friends (uid, fid, time)
VALUES
('$uid','$fid', '$time') ";
if (!mysql_query($sql,$con))
{
echo('Error:!'.mysql_error());
}
else{
echo('<img src="icon/exclamation.png" height="20px"> Add request sent!');
}
}
else{
$status=$row['status'];
switch($status){
case 1: cancel();
break;
case 2: unfriend();
break;
}
}
}
}
function cancel(){
error_reporting(0);
include('config.php');
$uid=$_COOKIE['iunv_id'];
$fid=$_POST['fid'];
$qw2="DELETE FROM friends WHERE uid='$uid' AND fid='$fid'";
if (!mysql_query($qw2,$con))
{
echo('Error!');
}
else{
echo('<img src="icon/exclamation.png" height="20px"> Add request Cancelled!');
}

}

function unfriend(){
error_reporting(0);
include('config.php');
$uid=$_COOKIE['iunv_id'];
$fid=$_POST['fid'];
$qw2="DELETE FROM friends WHERE uid='$uid' AND fid='$fid'";
if (!mysql_query($qw2,$con))
  {
  echo('Error!');
  }
$qw2="DELETE FROM friends WHERE uid='$fid' AND fid='$uid'";
if (!mysql_query($qw2,$con))
  {
  echo('Error!');
  }

else{
echo('<img src="icon/exclamation.png" height="20px"> Unfriended!');
}

}
}
?>
