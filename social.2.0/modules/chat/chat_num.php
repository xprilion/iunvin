<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$r=0;
$rf=mysql_query("SELECT * FROM user_friends WHERE oid='$uid' AND status='2'");
while($f=mysql_fetch_assoc($rf)){
$oid=$f['uid'];
$t=mysql_query("SELECT * FROM account WHERE id='$oid'");
$k=mysql_fetch_assoc($t);
$o=$k['chat'];
$un=$k['username'];
$n=$k['name'];
if($o=='1'){
$r++;
}
}

echo $r;

?>