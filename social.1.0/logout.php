<?php
include('config.php');
error_reporting(0);
$zoko="tata from iunv!";
$expire=time()-3600;
$uid=$_COOKIE['iunv_id'];

$rex=$_COOKIE['iunv_sessid'];
$sql4="DELETE FROM active WHERE uid='$uid'";
if (!mysql_query($sql4,$con))
  {
  die('Error: ' . mysql_error());
  }


setcookie("iunv_email", $zoko , $expire);
setcookie("iunv_id", $zoko , $expire);
setcookie("iunv_name", $zoko , $expire);
setcookie("iunv_uname", $zoko , $expire);
setcookie("iunv_upicc", $zoko , $expire);


setcookie("iunv_sessid", $zoko , $expire);
ob_end_flush();
echo('<META HTTP-EQUIV="refresh" CONTENT="0; ./">');

?>