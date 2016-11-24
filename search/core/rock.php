<?php

function login($u, $p){
$expire=time()+60*60*24*30;
setcookie("findu", $u, $expire, '/');
setcookie("findp", $p , $expire, '/');
}

function logout(){
$expire=time()-60*60*24*30;
setcookie("findu", $u, $expire, '/');
setcookie("findp", $p , $expire, '/');
}

?>