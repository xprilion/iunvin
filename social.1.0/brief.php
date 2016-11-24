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
echo('<div id="brief">');
include('config.php');
$uid=$_COOKIE['iunv_id'];
$p=$_POST['p'];
$sql2 = "SELECT * FROM account WHERE username='$p'";
$result = mysql_query($sql2) or die('error');
$row = mysql_fetch_assoc($result);
if(mysql_num_rows($result)) {
$sql = mysql_query("SELECT * FROM account WHERE username='$p'");
while($user= mysql_fetch_array($sql))
  {
$pemail=$user['email'];
$pname=$user['fullname'];
$puname=$user['username'];
$pcountry=$user['country'];
$pid=$user['id'];
$ppic=$user['avatar'];
$pgender=$user['gender'];
if(strlen($ppic)<3){
$ppic="icon/defaultpic.png";
$ppic2="";
}
else{
$ppic2='uploads/images/'.$puname.'/thumbnails/';
}
switch($pgender){
case 1: $pgender="Male";break;
case 2: $pgender="Female"; break;
default: $pgender="Closed"; break;
}
echo('<a href="profile?p='.$puname.'"><div id="prame">');
$sqlmy = mysql_query("SELECT * FROM myopicto WHERE uid='$pid'");
$myo= mysql_fetch_array($sqlmy);
$myopic=$myo['pic'];
if(strlen($myopic)<3){
$myopic="icon/myopicto.gif";
$myopic2="";
echo('<img id="pyopi" src="'.$myopic2.$myopic.'" height="198px" width="324px">');
}

else{

$myopic2='uploads/images/'.$puname.'/thumbnails/';
echo('<img id="pyopi" height="198px" width="324px" src="'.$myopic2.$myopic.'">');
}
echo('</div>');
echo('<div id="ppro"><img src="'.$ppic2.$ppic.'" style="max-height:150px; max-width: 150px;"></div>');
echo('<div id="pinfo">'.$pname.'<br>');
echo($pgender.'<br>');
echo($pcountry.'<br></div></a>');
echo('<div id="ad'.$pid.'" style="display: none;"> '.$pid.'</div>');
friends($pid);
}
}


echo('</div>');}




function friends($pid){
include('config.php');
$uid=$_COOKIE['iunv_id'];
$sql6 =" SELECT * FROM friends WHERE uid = '$pid' AND fid='$uid'";
$result6 = mysql_query($sql6); echo('sql6');

if(!mysql_num_rows($result6)){
$sql9 =" SELECT * FROM friends WHERE uid = '$uid' AND fid='$pid'";
$result9 = mysql_query($sql9);
$row9 = mysql_fetch_assoc($result9);
$status=$row9['status'];

if(!mysql_num_rows($result9)){
echo('<div id="addme'.$pid.'" class="addme" onclick="friend('.$pid.');"><img src="icon/add.png" height="20px"> Add</div>');
}
if($status==1){
echo('<div id="addme'.$pid.'" class="addme" onclick="friend('.$pid.');"><img src="icon/cross.png" height="20px" > Cancel Add request</div>');
}
}
else{
while($row6 = mysql_fetch_assoc($result6)){
$stat=$row6['status'];
if($stat==1){
echo('<div id="addme'.$pid.'" class="addme" onclick="accept('.$pid.');"><img src="icon/tick.png" height="20px"> Accept Add Request</div>');
}
if($stat==2){
echo('<div id="addme'.$pid.'" class="addme" onclick="friend('.$pid.');"><img src="icon/minus.png" height="20px"> Unfriend</div>');
}
}

}

}
?>