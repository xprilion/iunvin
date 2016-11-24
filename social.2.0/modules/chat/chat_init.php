<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$oid=$_POST['oid'];
$time=time();
if($oid!=$uid){
$ch=mysql_query("SELECT * FROM user_friends WHERE uid='$oid' AND oid='$uid'");
if(mysql_num_rows($ch)>0){
$p=mysql_fetch_assoc($ch);
$st=$p['status'];
if($st=='2'){
$f=mysql_query("SELECT * FROM chats_rooms WHERE aid='$uid' AND bid='$oid'");
if(mysql_num_rows($f)==0){
$f=mysql_query("SELECT * FROM chats_rooms WHERE bid='$uid' AND aid='$oid'");
}
if(mysql_num_rows($f)==0){
mysql_query("INSERT INTO chats_rooms (aid, bid, time) VALUES ('$uid', '$oid', '$time')");
}
$gh=mysql_fetch_assoc($f);
$cid=$gh['id'];
$o=1;
$e=mysql_query("SELECT * FROM chat_stories WHERE cid='$cid' AND visibility='1' ORDER BY `chat_stories`.`time` DESC LIMIT 0,30");

$ru=mysql_num_rows($e);
if($ru>0){
while(
$t=mysql_fetch_assoc($e)){
$gh[$o]=$t['id'];
$uj[$o]=$t['uid'];
$o++;
}
}
$l=$o-1;
while($l>0){
$h=$gh[$l];
$kid=$uj[$l];
$p=mysql_query("SELECT * FROM chat_texts WHERE csid='$h'");
while(
$i=mysql_fetch_assoc($p)){
$text=$i['text'];
if($kid==$uid){
echo '<li class="cMes cMe">'.$text.'</li>';
}
else{
echo '<li class="cMes cDe">'.$text.'</li>';
mysql_query("UPDATE chat_stories SET seen='1' WHERE id='$h'");
}

}
$l--;
}
}
}
}
echo('<form class="chatForm" action="" method="">
	<textarea class="chatInput" id="cText'.$oid.'" name="'.$oid.'"></textarea>
	</form>
');
?>
