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

$type=$_POST['type'];
switch($type){
case 50: threat(); break;
case 23: grp(); break;
case 25: frnd(); break;
case 27: are(); break;
}

}



function threat(){
include('config.php');
$sid=$_POST['sid'];
$reason=$_POST['rea'];
$uid=$_COOKIE['iunv_id'];
$time=time();
$type=50;
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");
while($streams= mysql_fetch_array($sql))
  {
$aid=$streams['uid'];
$sql2="INSERT INTO reports(uid, sid, aid, time, reason, type)
VALUES
('$uid','$sid','$aid','$time', '$reason', $type)";

if (!mysql_query($sql2,$con))
  {
  die('mysql Error: ' . mysql_error());
  }
echo('Reported! You should contact the police if problem persists.');

}
}

function grp(){
include('config.php');
$sid=$_POST['sid'];
$reason=$_POST['rea'];
$uid=$_COOKIE['iunv_id'];
$time=time();
$type=23;
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");
while($streams= mysql_fetch_array($sql))
  {
$aid=$streams['uid'];
$sql2="INSERT INTO reports(uid, sid, aid, time, reason, type)
VALUES
('$uid','$sid','$aid','$time', '$reason', $type)";

if (!mysql_query($sql2,$con))
  {
  die('mysql Error: ' . mysql_error());
  }
echo('Reported! You should contact the police if problem persists.');

}
}

function frnd(){
include('config.php');
$sid=$_POST['sid'];
$reason=$_POST['rea'];
$uid=$_COOKIE['iunv_id'];
$time=time();
$type=25;
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");
while($streams= mysql_fetch_array($sql))
  {
$aid=$streams['uid'];
$sql2="INSERT INTO reports(uid, sid, aid, time, reason, type)
VALUES
('$uid','$sid','$aid','$time', '$reason', $type)";

if (!mysql_query($sql2,$con))
  {
  die('mysql Error: ' . mysql_error());
  }
echo('Reported! You should contact the police if problem persists.');

}
}

function are(){
include('config.php');
$sid=$_POST['sid'];
$reason=$_POST['rea'];
$uid=$_COOKIE['iunv_id'];
$time=time();
$type=27;
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");
while($streams= mysql_fetch_array($sql))
  {
$aid=$streams['uid'];
$sql2="INSERT INTO reports(uid, sid, aid, time, reason, type)
VALUES
('$uid','$sid','$aid','$time', '$reason', $type)";

if (!mysql_query($sql2,$con))
  {
  die('mysql Error: ' . mysql_error());
  }
echo('Reported! You should contact the police if problem persists.');

}
}
?>