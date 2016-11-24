<?php

$sid=$_COOKIE['iunv_id'];
include('config.php');
include('chatterbox/check.php');
$sid=$_COOKIE['iunv_id'];

$friends= mysql_query("SELECT * FROM friends WHERE fid='$sid'");
while($frends=mysql_fetch_assoc($friends)){
$fid=$frends['uid'];
$fn= mysql_query("SELECT * FROM account WHERE id='$fid'");
while($fp=mysql_fetch_assoc($fn)){
$fname=$fp['username'];
$fnid=$fp['id'];
$cid=cid_check($sid,$fnid);
$online=$fp['online'];
if($online==1){
echo('<li class="online" onclick=startchat("'.$fnid.'","'.$cid.'","'.$fname.'")>'.$fname.'</li>');
}
else{
echo('<li class="offline" onclick=startchat("'.$fnid.'","'.$cid.'","'.$fname.'")>'.$fname.'</li>');
}

}
}
?>