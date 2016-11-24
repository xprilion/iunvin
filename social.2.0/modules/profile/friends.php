<?php

include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$oid=$_POST['uid'];
$time=time();
$sql=mysql_query("SELECT * FROM user_friends WHERE uid='$uid' AND oid='$oid'");
if(mysql_num_rows($sql)==0){
$sql2=mysql_query("SELECT * FROM user_friends WHERE oid='$uid' AND uid='$oid'");
$xx=mysql_fetch_assoc($sql2);
$stat=$xx['status'];
if($stat=='1'){
mysql_query("INSERT INTO user_friends (uid, oid, time, status, shown) VALUES ('$uid', '$oid', '$time', '2', '1')");
mysql_query("UPDATE user_friends SET status='2' WHERE uid='$oid' AND oid='$uid'");
mysql_query("UPDATE user_friends SET shown='1' WHERE uid='$oid' AND oid='$uid'");
echo('Friends');
}
else{
mysql_query("INSERT INTO user_friends (uid, oid, time) VALUES ('$uid', '$oid', '$time')");
echo('Pending');
}
}
else if(mysql_num_rows($sql)==1){
$x=mysql_fetch_assoc($sql);
$stats=$x['status'];
if($stats=='1'){
mysql_query("DELETE FROM user_friends WHERE uid='$uid' AND oid='$oid'");
echo('Add as friend');
}
else if($stats=='2'){
mysql_query("DELETE FROM user_friends WHERE uid='$uid' AND oid='$oid'");
mysql_query("DELETE FROM user_friends WHERE oid='$uid' AND uid='$oid'");
echo('Add as friend');
}

}
?>