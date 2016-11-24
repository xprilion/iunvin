<?php 
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

$c = mysql_connect("localhost", "username", "password");


$db = mysql_select_db("dbname", $c);



$content='streams';
$ratings='likes';



?>

