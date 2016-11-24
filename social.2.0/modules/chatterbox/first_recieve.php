<?php
include('config.php');
include('smileys.php');
$sid=$_COOKIE['iunv_id'];

$cid=$_GET['gil'];

$chag= mysql_query("SELECT * FROM chats WHERE cid='$cid'");
$k=mysql_num_rows($chag);
if($k>30){
$j=$k-30;
}

else{
$j=0;
}

$cha= mysql_query("SELECT * FROM chats WHERE cid='$cid' ORDER BY  `chats`.`time` ASC LIMIT $j, $k");
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
else{
echo('<li class="me">'.$ct.'</li>');
}
}
}
?>