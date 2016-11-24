<?php
$mods= array(
"dashboard",
"index",
"photos",
"signup",
"home",
"login",
"logout",
"profile", 
"friends",
"settings",
"chat"
);

if(isset($_GET['page'])){
$p=$_GET['page'];
}
else{
$p='index';
}

if(!in_array($p, $mods)){
$pname=$p;
$url= 'modules/profile/profile.php';
include($url);
}
else if($p=='profile'){
$pname=$_COOKIE['iunv_uname'];
$url= 'modules/profile/profile.php';
include($url);
}
else{
$url= 'modules/'.$p.'/'.$p.'.php';
include($url);
}
?>