<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
setcookie('iunv_chat', '1', '0', '/');
mysql_query("UPDATE account SET chat='1' WHERE id='$uid'");
echo('ok');
?>