<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
mysql_query("UPDATE account SET chat='0' WHERE id='$uid'");
echo('ok');
?>