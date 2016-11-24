<?php

include('config.php');
$pk=$_COOKIE['iunv_pk'];
setcookie("iunv_pk", $pk , '-3600', '/');
$prk=rand(1, 99999999);
$pkn=md5($prk, 'tiny');
$expire=time()+60*60*24*30;
setcookie("iunv_pk", $pkn , $expire, '/');
echo $prk;
echo $pkn;
?>