<?php
include('config.php');
include('smileys.php');
$text=$_POST['text'];
$text = htmlspecialchars($text, ENT_QUOTES);
$sid=$_COOKIE['iunv_id'];
$gid=$_POST['voila'];
$cid=$_POST['gil'];
$time= time();
if(strlen(trim($text))>0){
$x="INSERT INTO chats(sid, time, text, gid, cid) VALUES ('$sid', '$time', '$text', '$gid', '$cid')";
if(!mysql_query($x,$con)){

echo('0');

}
else{

$text=htmlspecialchars_decode($text, ENT_NOQUOTES);
echo smiley($text);
}
}
?>