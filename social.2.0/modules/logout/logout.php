<?php

include('config.php');
$zoko="tata from iunv!";
$expire=time()-3600;
$uid=$_COOKIE['iunv_id'];

$ip=$_SERVER['REMOTE_ADDR'];
mysql_query("UPDATE account SET chat='0' WHERE id='$uid'");
$sql4="DELETE FROM user_active WHERE uid='$uid' AND ip='$ip'";
if (!mysql_query($sql4,$con))
  {
  die('Error: ' . mysql_error());
  }
setcookie("iunv_email", $zoko , $expire, '/');
setcookie("iunv_id", $zoko , $expire, '/');
setcookie("iunv_name", $zoko , $expire, '/');
setcookie("iunv_bg", $zoko , $expire, '/new');
setcookie("iunv_th", $zoko , $expire, '/new');
setcookie("iunv_pk", $zoko , $expire, '/');
setcookie("iunv_uname", $zoko , $expire, '/');
setcookie("iunv_upicc", $zoko , $expire, '/');
setcookie("iunv_rex", $zoko , $expire, '/');
setcookie("iunv_pp", $zoko , $expire, '/new/modules');
setcookie("iunv_ppn", $zoko , $expire, '/new/modules');
setcookie("iunv_chat", $zoko , $expire, '/');

if(!isset($_COOKIE['iunv_id'])){
echo("<script>
window.setTimeout(function(){go();}, 500);
function go(){
window.location.replace('./');
}
</script>");
}
else{
echo("<script>
window.setTimeout(function(){again();}, 100);
function again(){
window.location.replace('./logout');
}
</script>");
}
?>
Please wait...