<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$sql3=mysql_query("SELECT * FROM user_notifs WHERE uid='$uid' AND shown='0'");
$num=mysql_num_rows($sql3);
echo $num;
if($num>0){
while($n=mysql_fetch_assoc($sql3)){
$notif=$n['notif'];
$time=$n['time'];
$seen=$n['seen'];
$sid=$n['sid'];
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

if($seen=='0'){
echo('<a href="./'.$sid.'"><div class="notifys notifunseen" style="width: 93%;">');
}
else{
echo('<a href="./'.$sid.'"><div class="notifseen notifys" style="width: 93%;">');
}
echo '<table class="streamtb1" style="width: 100%;"><tr><td class="imtd"><a href="'.$puname.'" title="'.$name.'"><img class="lazy proThumb" src="'.$upicth.'"></a></td><td><table class="streamtb1"><tr><td><a href="'.$puname.'" class="portsa" title="'.$name.'">'.$name.'</a></td></tr><tr class="vertd"><td><div class="dstory" style="width: 75%;">'.$notif.'</div></td></tr></table></td></tr></table>';
echo('</div></a>');
mysql_query("UPDATE user_notifs SET shown='1' WHERE uid='$uid' AND time='$time'");
}
}
?>