<?php 

$db_host = "localhost";
$db_username = "root"; 
$db_pass = "2101996";
$db_name = "users";

$con = mysql_connect($db_host,$db_username,$db_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db($db_name,$con);

?>