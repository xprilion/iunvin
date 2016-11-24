<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$oid=$_POST['oid'];
$text=$_POST['text'];
$time=time();
if($oid!=$uid){
$ch=mysql_query("SELECT * FROM user_friends WHERE uid='$oid' AND oid='$uid'");
if(mysql_num_rows($ch)>0){
$p=mysql_fetch_assoc($ch);
$st=$p['status'];
if($st=='2'){
$f=mysql_query("SELECT * FROM chats_rooms WHERE aid='$uid' AND bid='$oid'");
if(mysql_num_rows($f)==0){
$f=mysql_query("SELECT * FROM chats_rooms WHERE bid='$uid' AND aid='$oid'");
}
if(mysql_num_rows($f)==0){
mysql_query("INSERT INTO chats_rooms (aid, bid, time) VALUES ('$uid', '$oid', '$time')");
}
$gh=mysql_fetch_assoc($f);
$cid=$gh['id'];
$trackid=$time.$uid;
mysql_query("INSERT INTO chat_stories (uid, cid, time, type, trackid) VALUES ('$uid', '$cid', '$time', 1, '$trackid')");
$y=mysql_query("SELECT * FROM chat_stories WHERE cid='$cid' AND trackid='$trackid'");
$m=mysql_fetch_assoc($y);
$csid=$m['id'];
mysql_query("INSERT INTO chat_texts (csid, text) VALUES ('$csid', '$text')");
echo '1';
}
}
}
?>