<?php
include('config.php');
$sid=$_COOKIE['iunv_id'];
mysql_query("UPDATE account SET online=0 WHERE id='$sid'");

?>