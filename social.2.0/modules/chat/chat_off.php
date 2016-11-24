<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
setcookie('iunv_chat', '0', '0', '/');
mysql_query("UPDATE account SET chat='0' WHERE id='$uid'");
echo('ok');
?>