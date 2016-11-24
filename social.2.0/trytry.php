<?php
include('config.php');

$g=$_GET['g'];
$er=mysql_query("SELECT * FROM account WHERE username='$g'");
$y=mysql_fetch_assoc($er);
$p=$y['spamk'];
echo $p;

?>