<?php
include('../../config.php');

$sid=$_POST['sid'];
$uid=$_COOKIE['iunv_id'];

$u=mysql_query("SELECT * FROM stories WHERE id='$sid'");
$d=mysql_fetch_assoc($u);
$yid=$d['uid'];
if($uid==$yid){
$vis=$d['visibility'];
if($vis=='1'){
del($sid);
}
else if($vis=='0'){
echo 'Post does not exist!';
}
}
else{
rep($sid);
}

function del($sid){
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$r=mysql_query("SELECT * FROM story_connects WHERE sid='$sid'");
$f=mysql_num_rows($r);
$n=0;
while($n<$f){
mysql_query("DELETE FROM story_connects WHERE sid='$sid'");
$n++;
}
mysql_query("UPDATE stories SET visibility='0' WHERE id='$sid'");
echo("The post was successfully removed.");
}

function rep($sid){
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$time=time();
$t=mysql_query("SELECT * FROM story_reports WHERE sid='$sid' AND uid='$uid'");
if(mysql_num_rows($t)==0){
mysql_query("DELETE FROM story_connects WHERE sid='$sid' AND uid='$uid'");
mysql_query("INSERT INTO story_reports (sid, uid, time, status) VALUES ('$sid', '$uid', '$time', '0')");
echo("The post was successfully reported. You will be notified when we have reviewed this post.");
}
else{
echo('You have already reported this post. You will be notified when we have reviewed this post.');
}
}

?>