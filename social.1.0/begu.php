<?php
include('config.php');
$cokie=$_COOKIE['iunv_sessid'];
$uid=$_COOKIE['iunv_id'];
$rex=1;
$sql = mysql_query("SELECT * FROM active WHERE id='$uid'");
while($auth= mysql_fetch_array($sql)){
$rex=$auth['cookie'];
}
if(!$rex==$cokie){
Header('Location: log-in');
exit();
}
else{

$beg=$_POST['begu'];
$p=$_POST['p'];
if($beg=='info'){
include('config.php');
$sql=mysql_query("SELECT * FROM account WHERE username='$p'");
while($user= mysql_fetch_array($sql))
{
$pintro=$user['intr'];
$pabout=$user['about_me'];
$pyear=$user['birthyear'];
$pmonth=$user['birthmonth'];
$pday=$user['birthday'];
$pcountry=$user['country'];
$ponlyme=$user['onlyme'];
$plikes=$user['likes'];
$pdislikes=$user['dislikes'];
$pprofession=$user['profession'];
echo('Country: '.$pcountry.'<br>');
echo('Introduction: '.$pintro.'<br>');

echo('About Me: '.$pabout.'<br>');
echo('Birthday: '.$pday.'-'.$pmonth.'-'.$pyear.'<br>');
echo('Profession: '.$pprofession.'<br>');
echo('Likes: '.$plikes.'<br>');

echo('Dislikes: '.$pdislikes.'<br>');
echo('Specialities: '.$ponlyme.'<br>');
}
}
if($beg=='friend'){
include('config.php');
$sql2 = mysql_query("SELECT * FROM account WHERE username='$p'");
while($user= mysql_fetch_array($sql2))
  {
$uid=$user['id'];
$sql3 = mysql_query("SELECT * FROM friends WHERE fid='$uid' AND status='2' ");
while($frnd= mysql_fetch_array($sql3))
  {
$fid=$frnd['uid'];
$b=mysql_num_rows($sql3);
$sql4 = mysql_query("SELECT * FROM account WHERE id='$fid'");
while($namu= mysql_fetch_array($sql4))
  {
$name=$namu['fullname'];
$uname=$namu['username'];
$pic=$namu['avatar'];
$id=$namu['id'];
if(strlen($pic)<3){
$pic="icons/defaultpic.png";
$pic2="";
}

else{
$pic2='uploads/images/'.$uname.'/thumbnails/';
}
echo('<a href="profile?p='.$uname.'"><img src="'.$pic2.$pic.'" style="max-height: 120px; max-width: 120px;"><div id="nam" onmouseover=olykix("'.$uname.'"); onmouseout="hbrief()"> '.$name.'</div></a>');
echo('<div id="ad'.$b.'" style="display: none;"> '.$id.'</div>');
$sql5 =" SELECT * FROM friends WHERE uid = '$id' AND fid='$uid'";
    $result2 = mysql_query($sql5);
    $row2 = mysql_fetch_assoc($result2);
if(!mysql_num_rows($result2)){
$sql6 =" SELECT * FROM friends WHERE uid = '$uid' AND fid='$id'";
    $result = mysql_query($sql6);
    $row = mysql_fetch_assoc($result);
$status=$row['status'];

if(!mysql_num_rows($result)){
echo('<div id="addme'.$b.'" class="addme" onclick="friend('.$b.');"><img src="icons/add.png" height="20px"> Add</div><br><hr>');
}
if($status==1){
echo('<div id="addme'.$b.'" class="addme" onclick="friend('.$b.');"><img src="icons/cross.png" height="20px" > Cancel Add request</div><br><hr>');
}
}
else{
$stat=$row2['status'];
if($stat==1){
echo('<div id="addme'.$b.'" class="addme" onclick="accept('.$b.');"><img src="icons/tick.png" height="20px"> Accept Add Request</div><br><hr>');
}
else{
echo('<div id="addme'.$b.'" class="addme" onclick="friend('.$b.');"><img src="icons/minus.png" height="20px"> Unfriend</div><br><hr>');
}
}
$b++;
}
}
}
}
if($beg=='photo'){
$p=$_POST['p'];
echo('<iframe src="pho?p='.$p.'" style="height: 320px; width: 520px; margin: 0px;" scrolling="no" frameborder="0" ></iframe>');
}
}

?>