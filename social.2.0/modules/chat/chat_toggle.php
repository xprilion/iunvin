<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$st=mysql_query("SELECT * FROM account WHERE id='$uid'");
$g=mysql_fetch_assoc($st);
$c=$g['chat'];
if($c=='0'){
mysql_query("UPDATE account SET chat='1' WHERE id='$uid'");
echo 'On';
setcookie('iunv_chatPresence', '1', '0', '/new');
}
else{
mysql_query("UPDATE account SET chat='0' WHERE id='$uid'");
echo 'Off';
setcookie('iunv_chatPresence', '0', '0', '/new');
}
?>