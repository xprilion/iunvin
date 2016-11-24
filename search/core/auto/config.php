<?php 
set_time_limit(0);

ob_start();
$db_host = "localhost";
$db_username = "username"; 
$db_pass = "password";
$db_name = "dbname";

$con = mysql_connect("localhost",$db_username,$db_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db($db_name,$con);

?>