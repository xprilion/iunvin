<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$sql3=mysql_query("SELECT * FROM user_friends WHERE oid='$uid' AND shown='0'");
$num=mysql_num_rows($sql3);
echo $num;
if($num>0){
while($n=mysql_fetch_assoc($sql3)){
$time=$n['time'];
$oid=$n['oid'];
$sqle = mysql_query("SELECT * FROM account WHERE id='$oid'");
$s= mysql_fetch_assoc($sqle);
$upic=$s['propic'];
$puname=$s['username'];
$upicth='img/thumb_default.png';
$upicbg='img/big_default.png';
if($upic!='default'){
$upicth='uploads/images/'.$oid.'/thumbnails/'.$upic;
$upicbg='uploads/images/'.$oid.'/'.$upic;
}
$name=$s['name'];
echo('<div class="notifys notifunseen" style="width: 93%;">');
echo '<table class="streamtb1" style="width: 100%;"><tr><td class="imtd"><a href="'.$puname.'" title="'.$name.'"><img class="lazy proThumb" src="'.$upicth.'"></a></td><td><table class="streamtb1"><tr><td><a href="'.$puname.'" class="portsa" title="'.$name.'">'.$name.'</a><div class="uMenO uMenOut right uxfr'.$oid.'" onclick=friends("'.$oid.'")>Accept request</div></td></tr></table></td></tr></table>';
echo('</div>');
mysql_query("UPDATE user_friends SET shown='1' WHERE oid='$uid' AND uid='$oid'");
}
}
?>