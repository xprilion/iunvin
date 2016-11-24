<?php
include('config.php');
include('smileys.php');
$cid=$_POST['gil'];
$sid=$_COOKIE['iunv_id'];
$cha= mysql_query("SELECT * FROM chats WHERE cid='$cid' AND seen='0'");
if(mysql_num_rows($cha)>0){
while($chat=mysql_fetch_assoc($cha)){
$cs=$chat['sid'];
$cd=$chat['id'];
$ct=$chat['text'];
$ct=htmlspecialchars_decode($ct, ENT_NOQUOTES);
$ct=smiley($ct);
if($cs!==$sid){
echo('<li class="they">'.$ct.'</li>');
mysql_query("UPDATE chats SET seen='1' WHERE id='$cd'");
}
}
}

?>