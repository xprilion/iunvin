<?php
include('../../config.php');
$pic=$_COOKIE['iunv_bg'];
$th=$_COOKIE['iunv_th'];
$uid=$_COOKIE['iunv_id'];
$r=mysql_query("SELECT * FROM user_settings WHERE uid='$uid'");
if(mysql_num_rows($r)==0){
mysql_query("INSERT INTO user_settings (uid, background, theme) VALUES ('$uid', '$pic', '$th')");
}
else{
mysql_query("UPDATE user_settings SET background='$pic', theme='$th' WHERE uid='$uid'");
}
echo 'ok';
?>