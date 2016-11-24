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
echo('<div id="min">');
date_default_timezone_set('Asia/Calcutta');
$sql = mysql_query("SELECT * FROM messages WHERE uid='$uid' AND type='3'" );
while($msgs= mysql_fetch_array($sql))
  {
$frid=$msgs['tid'];
$text3=$msgs['text'];
$text2=htmlspecialchars_decode($text3, ENT_NOQUOTES);
$sub=$msgs['subject'];
$time=$msgs['time'];
$mid=$msgs['id'];
$hours = date("d.m.y : H:i", $time);  
$text= " ";
if(strlen($sub)>30){
$text= " ";
}
else{
$px=30-(strlen($sub));
if(strlen($text2)>$px){
$text= substr($text, 0, $px-1);
}
else{
$text=$text2;
}
}
$sql2 = mysql_query("SELECT * FROM account WHERE id='$frid'" );
while($user= mysql_fetch_array($sql2))
  {
$sname=$user['fullname'];
echo('<li onclick=mread("'.$mid.'")><b>'.$sname.': </b>'.$sub.'<div class="faded">'.$text.'<div id="time"><i>'.$hours.'</i></div></div></li>');
}
}
echo('</div>');
}
?>