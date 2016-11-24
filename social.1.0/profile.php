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
if(!isset($_GET['p'])){

HEADER('Location: dashboard');
}
else{

$p=$_GET['p'];

$u=$_COOKIE['iunv_uname'];

if($p==$u){

HEADER('Location: dashboard');
}

else{


echo('<!DOCTYPE html>
<html>
<head>
<script>
function begu(whi){
var pp= document.getElementById("sisi").innerHTML;
var xmlhttp;
if (whi.length==1)
  { 
   document.getElementById("conti").innerHTML=xmlhttp.responseText;

  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    document.getElementById("conti").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","begu.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("begu="+whi+"&p="+pp);
}
</script>
<script>

function friend(gof)
{
var fid=document.getElementById("ad"+gof).innerHTML;
var xmlhttp;
if (fid.length==1)
  { 
   document.getElementById("addme"+gof).innerHTML=xmlhttp.responseText;

  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    document.getElementById("addme"+gof).innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","friendsfunc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("fid="+fid);
}
function accept(gof)
{
var fid=document.getElementById("ad"+gof).innerHTML;
var xmlhttp;
if (fid.length==1)
  { 
   document.getElementById("addme"+gof).innerHTML=xmlhttp.responseText;

  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    document.getElementById("addme"+gof).innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","requests.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("fid="+fid);
}
</script>');
include('header.php');
echo('<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
$("#carousel").niceScroll();
$("#notifs").niceScroll();
});
</script>
<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';document.getElementById('resulta').style.display='none';");
echo('">
<div id="feed">');
include('profilefeed.php');
echo('</div>
</div>
<div id="content">');

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
$pid=$user['id'];
$ppic=$user['avatar'];
$ptim=$user['created'];
$psince=date("D F d Y", $ptim);
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
echo('<title>'.$pname.'</title>');
echo('<div id="pro"><img id="propic" src="'.$ppic2.$ppic.'" style="max-height:150px; left: 0px; max-width: 150px;">');
echo('<div id="info">'.$pname.'<br>');
echo($puname.'<br>');
echo($pgender.'<br>');
echo($pemail.'<br>');
echo('Member since: '.$psince.'</div>
<a href="message?to='.$puname.'"><div id="message" style="
display: inline-block;
position: absolute;
right: 30px;"><img src="icon/message.png"></div></a>
</div>');
echo('<div id="oth">');
echo('<div id="tabbar">');
$infoo="onclick=begu('info')";
echo('<div id="tab" '.$infoo.'> Info </div>');
$photoo="onclick=begu('photo')";
echo('<div id="tab" '.$photoo.'> Photos </div>');
$friendo="onclick=begu('friend')";
echo('<div id="tab" '.$friendo.'> Friends </div>');
echo(' </div><div id="sisi" style="display: none;">'.$puname.'</div>');
echo('<div id="conti">');
$sqlmy = mysql_query("SELECT * FROM myopicto WHERE uid='$pid'");
$myo= mysql_fetch_array($sqlmy);
$myopic=$myo['pic'];
if(strlen($myopic)<3){
$myopic="icon/myopicto.gif";
$myopic2="";
echo('<a href="myopicto"><img id="myopi" src="'.$myopic2.$myopic.'" height="320px" width="540px"></a>');
}
else{
$myopic2='uploads/images/'.$puname.'/thumbnails/';
echo('<a href="myopicto"><img id="myopi" src="'.$myopic2.$myopic.'" height="330px" width="550px"></a>');

}
echo('</div>');
echo('</div>');
}
}

}
}
echo('</div>

<div id="holder">');
include('sidebar.php');
echo('</div>

</div>
<div id="footer">');
include('footer.php');
echo('</div>');
}
?>