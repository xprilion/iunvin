<div id="bFriends"  class="right notif0" onclick="friendsno()">
<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$sql3=mysql_query("SELECT * FROM user_friends WHERE oid='$uid' AND shown='0' ORDER BY `user_friends`.`time` DESC LIMIT 0, 15");
$num=mysql_num_rows($sql3);
echo $num;
echo('</div><div id="friendsnotif" style="display: none; height: auto; padding: 1%;"><div id="friendsTop" style="display: inline;"></div>');
if($num==0){
echo('<div class="notifys notifseen" style="width: 93%;">');
echo('No new friend request.');
echo('</div>');
}
else{
while($n=mysql_fetch_assoc($sql3)){
$time=$n['time'];
$oid=$n['uid'];
$sqle = mysql_query("SELECT * FROM account WHERE id='$oid'");
$s= mysql_fetch_assoc($sqle);
$upic=$s['propic'];
$puname=$s['username'];
$upicth='../../img/thumb_default.png';
$upicbg='../../img/big_default.png';
if($upic!='default'){
$upicth='../../uploads/images/'.$oid.'/thumbnails/'.$upic;
$upicbg='../../uploads/images/'.$oid.'/'.$upic;
}
$name=$s['name'];
echo('<div class="notifys notifunseen" style="width: 93%;">');
echo '<table class="streamtb1" style="width: 100%;"><tr><td class="imtd"><a href="'.$puname.'" title="'.$name.'"><img class="lazy proThumb" src="'.$upicth.'"></a></td><td><table class="streamtb1"><tr><td><a href="'.$puname.'" class="portsa" title="'.$name.'">'.$name.'</a><div class="uMenO uMenOut right uxfr'.$oid.'" onclick=friends("'.$oid.'")>Accept request</div></td></tr></table></td></tr></table>';
echo('</div>');
mysql_query("UPDATE user_friends SET shown='1' WHERE oid='$uid' AND uid='$oid'");
}
}
?>
</div>