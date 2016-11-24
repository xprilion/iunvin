<?php
include('config.php');
include('friendship.php');
$uid=$_COOKIE['iunv_id'];
$qwe= Array();
$hug= Array();
$mxx=0;
$zxx=mysql_query("SELECT * FROM user_friends WHERE oid='$uid' AND status='2'");
while($oax=mysql_fetch_assoc($zxx)){
$qwe[$mxx]=$oax['uid'];
$mxx++;
}
$nxx=0;
$twoxx=mysql_query("SELECT * FROM account WHERE id!='$uid'");
while($taxx=mysql_fetch_assoc($twoxx)){
$hug[$nxx]=$taxx['id'];
$nxx++;
}

$rx = array_diff($hug, $qwe);

array_unshift($rx," ");
array_filter($rx);
$c=count($rx);
$d=0;
$k=0;
while($d<$c){
$yid=$rx[$d];
if($yid>0){
$er=mysql_query("SELECT * FROM user_settings WHERE uid='$yid'");
if(mysql_num_rows($er)==0){
$we=mysql_query("SELECT * FROM user_friends WHERE uid='$uid' AND oid='$yid'");
if(mysql_num_rows($we)==0){
prof($yid);
$k++;
}

}
else{
$dr=mysql_fetch_assoc($er);
$per=$dr['search'];
if($per=='1'){
$we=mysql_query("SELECT * FROM user_friends WHERE uid='$uid' AND oid='$yid'");
if(mysql_num_rows($we)==0){
prof($yid);
$k++;
}

}
}
}
$d++;
}
if($k==0){
echo 'Oops! We have no suggestions for you at this moment. Please try again later.<br><br>';
}
?>