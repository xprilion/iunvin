<?php
include('../../config.php');
$num=0;
$uid=$_COOKIE['iunv_id'];
$a=mysql_query("SELECT * FROM chats_rooms WHERE aid='$uid' OR bid='$uid'");
while($b=mysql_fetch_assoc($a)){
$cid=$b['id'];
$c=mysql_query("SELECT * FROM chat_stories WHERE uid!='$uid' AND cid='$cid'");
while($d=mysql_fetch_assoc($c)){
$e=$d['notified'];
if($e=='0'){
$r=$d['id'];
$j[$num]=$d['id'];
$oid[$num]=$d['uid'];
$kk=$d['uid'];
$yy=mysql_query("SELECT * FROM account WHERE id='$kk'");
$xx=mysql_fetch_assoc($yy);
$uname[$num]=$xx['username'];
$y=mysql_query("SELECT * FROM chat_texts WHERE csid='$r'");
$x=mysql_fetch_assoc($y);
$text[$num]=$x['text'];
$num++;
}
}
}
header('Content-type: application/json');
$g=0;
$n=$num;
$po=array();
$nums=array('nums' => "".$num."");
while($g<$n){
$oi=$oid[$g];
$csid=$j[$g];
$tex=$text[$g];
$un=$uname[$g];
mysql_query("UPDATE chat_stories SET notified='1' WHERE id='$csid'");
$ty[$g]=array('oid' => $oi, 'text' => $tex, 'uname' => $un);
$g++;
}
if(!empty($ty)){
$ret=$ty;
echo json_encode($ret);
}
?>