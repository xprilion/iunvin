<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$sid=$_POST['sid'];
$text=$_POST['text'];
$text= htmlspecialchars($text, ENT_QUOTES);
$texts=substr($text, 0, 50);
$texti=' ';
if(strlen($text)>49){
$texti=$texts."...";
}
else{
$texti=$texts;
}
$time=time();
mysql_query("INSERT INTO story_comments (sid, uid, text, time) VALUES ('$sid', '$uid', '$text', '$time')");

$ety=mysql_query("SELECT * FROM account WHERE id='$uid'");
$etr=mysql_fetch_assoc($ety);
$name=$etr['name'];
$uname=$etr['username'];
$ty=mysql_query("SELECT * FROM stories WHERE id='$sid'");
$tr=mysql_fetch_assoc($ty);
$oid=$tr['uid'];

if($oid!=$uid){
$notif='commented your post: '.$texti;
mysql_query("INSERT INTO user_notifs (uid, notif, sid, time, oid) VALUES ('$oid', '$notif', '$sid', '$time', '$uid')");
}

echo 'ok';
?>