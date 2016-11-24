<?php
include('../../config.php');
$time=time();
$r1=rand(1, 9999999999);
$r2=rand(-9999999999, 1);
$t= $r1+$r2-1000000000;
$trackid=md5($t.$time);
$type=1;
$uid=$_COOKIE['iunv_id'];
$text2=$_POST['postedText'];
$text = htmlspecialchars($text2, ENT_QUOTES);
$tri=trim($text);
if(strlen($tri)>0){
$sql="INSERT INTO stories(uid, time, type, trackid, visibility) VALUES ('$uid','$time',1, '$trackid', 1)";
if (!mysql_query($sql,$con)){echo('Error:!'.mysql_error());}

else{
$sql=mysql_query("SELECT * FROM stories WHERE trackid='$trackid' ");
while($stri= mysql_fetch_array($sql))
  {
$sid=$stri['id'];
streamText($sid, $text, $trackid);
echo 'ok';
}}}

function streamText($sid, $text, $trackid){
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$sql="INSERT INTO story_texts(sid, text, trackid) VALUES ('$sid','$text', '$trackid')";
if (!mysql_query($sql,$con)){echo('Error:!'.mysql_error());}
$time=time();
mysql_query("INSERT INTO story_connects (uid, sid, time) VALUES ('$uid', '$sid', '$time')");
$sqlw=mysql_query("SELECT * FROM user_friends WHERE oid='$uid' AND status='2'");
while($s=mysql_fetch_assoc($sqlw)){
$fid=$s['uid'];
mysql_query("INSERT INTO story_connects (uid, sid, time) VALUES ('$fid', '$sid', '$time')");
}
}
?>