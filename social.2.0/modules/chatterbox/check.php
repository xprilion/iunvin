<?php

function login_check(){
include('config.php');

$cokie=$_COOKIE['iunv_sessid'];
$uid=$_COOKIE['iunv_id'];
$rex=1;
$sql = mysql_query("SELECT * FROM active WHERE id='$uid'");
while($auth= mysql_fetch_array($sql)){
$rex=$auth['cookie'];
}
if(!$rex==$cokie){
Header('Location: ../log-in');
exit();
}
}

function cid_check($sid,$gid){
include('config.php');
$check = mysql_query("SELECT * FROM chats WHERE sid='$sid' AND gid='$gid'");
if(mysql_num_rows($check)>0){
$ti=mysql_fetch_assoc($check);
$cid=$ti['cid'];
return($cid);
exit();
}
else{
$check = mysql_query("SELECT * FROM chats WHERE sid='$gid' AND gid='$sid'");
if(mysql_num_rows($check)>0){
$ti=mysql_fetch_assoc($check);
$cid=$ti['cid'];
return($cid);
exit();
}

else{
$time=time();
$cid=$time.'_'.$sid.'_'.$gid;
return($cid);
exit();
}
}
}

?>