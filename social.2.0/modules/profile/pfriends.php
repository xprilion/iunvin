<div id="buksfriends">
<?php
include('../../config.php');
$oid=$_POST['quax'];
$uid=$_COOKIE['iunv_id'];
$vv=0;
if($oid!=$uid){
$ch=mysql_query("SELECT * FROM user_friends WHERE uid='$oid' AND oid='$uid'");
if(mysql_num_rows($ch)>0){
$p=mysql_fetch_assoc($ch);
$st=$p['status'];
if($st=='2'){
$we=mysql_query("SELECT * FROM user_friends WHERE uid='$oid'");
while($r=mysql_fetch_assoc($we)){
$str=$r['status'];
$fid=$r['oid'];
if($str=='2'){
prof($fid);
$vv++;
}
}
}
}
}
else{
$we=mysql_query("SELECT * FROM user_friends WHERE uid='$uid'");
while($r=mysql_fetch_assoc($we)){
$str=$r['status'];
$fid=$r['oid'];
if($str=='2'){
prof($fid);
$vv++;
}
}
}

if($vv==0){
echo '<br><div style="margin-left: 5%;">No friends yet!</div><br>';
}

function prof($uid){
include('../../config.php');
$we=mysql_query("SELECT * FROM account WHERE id='$uid'");
while($r=mysql_fetch_assoc($we)){
$name=$r['name'];
$oname=$r['username'];
$opic=$r['propic'];
$opicth='img/thumb_default.png';
$opicbg='img/big_default.png';
if($opic!='default'){
$opicth='uploads/images/'.$uid.'/thumbnails/'.$opic;
$opicbg='uploads/images/'.$uid.'/'.$opic;
}
$oid=$_COOKIE['iunv_id'];
if($oid!=$uid){
$ch=mysql_query("SELECT * FROM user_friends WHERE uid='$oid' AND oid='$uid'");
if(mysql_num_rows($ch)==0){
$cho=mysql_query("SELECT * FROM user_friends WHERE oid='$oid' AND uid='$uid'");
$cco=mysql_fetch_assoc($cho);
$cso=$cco['status'];
if($cso=='1'){
$friendstat='Accept request';
}
else{
$friendstat='Add as friend';
}

}
else if(mysql_num_rows($ch)==1){
$cc=mysql_fetch_assoc($ch);
$cs=$cc['status'];
if($cs=='1'){
$friendstat='Pending';
}
else if($cs=='2'){
$friendstat='Friends';
}
}
}
echo('<div class="whiteDiv">');
echo '<table class="streamtb"><tr><td class="imtd"><a href="'.$oname.'" title="'.$name.'"><img class="lazy proThumb" src="'.$opicth.'"></a></td><td style="width: 100%;"><table class="streamtb" style="width: 100%;"><tr><td style="width: 100%;"><a href="'.$oname.'" class="portsa" title="'.$name.'">'.$name.'</a></td></tr><tr><td>';
if($oid!=$uid){
echo('<div class="uMenO uMenOut right uxfr'.$uid.'" onclick=friends("'.$uid.'")>'.$friendstat.'</div>');
}
echo'</td></tr></table></td></tr></table>';
echo('</div>');
}
}
?>
</div>