<?php

include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$sid=$_POST['sid'];
$time=time();
$ety=mysql_query("SELECT * FROM account WHERE id='$uid'");
$etr=mysql_fetch_assoc($ety);
$name=$etr['name'];
$uname=$etr['username'];
$ty=mysql_query("SELECT * FROM stories WHERE id='$sid'");
$tr=mysql_fetch_assoc($ty);
$oid=$tr['uid'];
$sql=mysql_query("SELECT * FROM story_likes WHERE sid='$sid' AND uid='$uid'");
if(mysql_num_rows($sql)==0){
mysql_query("INSERT INTO story_likes (uid, sid) VALUES ('$uid', '$sid')");
$sqlw=mysql_query("SELECT * FROM story_connects WHERE sid='$sid' AND uid='$uid'");
if(mysql_num_rows($sqlw)==0){
$time=time();
mysql_query("INSERT INTO story_connects (uid, sid, time) VALUES ('$uid', '$sid', '$time')");
if($oid!=$uid){
$notif='likes your post';
mysql_query("INSERT INTO user_notifs (uid, notif, sid, time, oid) VALUES ('$oid', '$notif', '$sid', '$time', '$uid')");
}
}
echo('add');
}
else{
mysql_query("DELETE FROM story_likes WHERE uid='$uid' AND sid='$sid'");
if($oid!=$uid){
mysql_query("DELETE FROM story_connects WHERE uid='$uid' AND sid='$sid'");
}
echo('red');
}

?>