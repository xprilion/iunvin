<?php

include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$pk=$_COOKIE['iunv_pk'];
$time=time();
$text2=$_POST['cap'];
$text = htmlspecialchars($text2, ENT_QUOTES);
$sql=mysql_query("SELECT * FROM user_uploads WHERE trackid='$pk' AND uid='$uid' ");
while($stri= mysql_fetch_array($sql))
  {
$img=$stri['link'];
$sql="INSERT INTO stories(uid, time, type, trackid, visibility) VALUES ('$uid','$time',2, '$pk', 1)";
if (!mysql_query($sql,$con)){echo('Error:!'.mysql_error());}

else{
$sqlr=mysql_query("SELECT * FROM stories WHERE trackid='$pk' ");
while($strir= mysql_fetch_array($sqlr))
  {
$sid=$strir['id'];
streamPhoto($sid, $text, $img);

echo 'ok';
}
}
}

function streamPhoto($sid, $text, $img){
include('../../config.php');
$pk=$_COOKIE['iunv_pk'];
$uid=$_COOKIE['iunv_id'];
$sql="INSERT INTO story_photos(sid, trackid, caption, img) VALUES ('$sid', '$pk', '$text', '$img')";
if (!mysql_query($sql,$con)){echo('Error:!'.mysql_error());}
else{
setcookie("iunv_pk", $pk , '-3600', '/');
$prk=rand(1, 99999999);
$pkn=md5($prk.'tiny');
$expire=time()+60*60*24*30;
setcookie("iunv_pk", $pkn , $expire, '/');
}
$time=time();
mysql_query("INSERT INTO story_connects (uid, sid, time) VALUES ('$uid', '$sid', '$time')");
$sqlw=mysql_query("SELECT * FROM user_friends WHERE oid='$uid' AND status='2'");
while($s=mysql_fetch_assoc($sqlw)){
$fid=$s['uid'];
mysql_query("INSERT INTO story_connects (uid, sid, time) VALUES ('$fid', '$sid', '$time')");
}
}

?>