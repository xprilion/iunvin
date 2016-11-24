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
$uid=$_COOKIE['iunv_id'];
$fid=$_POST['fid'];
$sql = "SELECT * FROM friends WHERE fid = '$uid' AND uid='$fid'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
$status=$row['status'];
if(!mysql_num_rows($result)){
echo('Error!');
}
else{
if($status==2){
echo('<img src="icon/exclamation.png" height="20px">Already friends!');
exit;
}
else{
$sql = "UPDATE friends SET status=2 WHERE fid='$uid' AND uid='$fid'";
if(!mysql_query($sql,$con)){
echo('Errorr!');
}
$sql = "UPDATE friends SET status=2 WHERE fid='$uid' AND uid='$fid'";
if(!mysql_query($sql,$con)){
echo('Errorr!');
}
$time=time();
$sql="INSERT INTO friends (uid, fid, time, status)
VALUES
('$uid','$fid', '$time', 2) ";
if (!mysql_query($sql,$con))
  {
  echo('Error:!'.mysql_error());
  }
else{

echo('<img src="icon/exclamation.png" height="20px"> Confirmed!');

}

}
}
}
?>