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
echo('
<!DOCTYPE html>
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
</script>
<script>

function olykix(jee)
{
document.getElementById("brief2").style.opacity= "1";
var xmlhttp;
if (jee.length==0)
  { 
   document.getElementById("brief2").innerHTML=xmlhttp.responseText;

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

    document.getElementById("brief2").innerHTML=xmlhttp.responseText;
    
  }
xmlhttp.open("POST","brief.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("p="+jee);
}



function hbrief(){

document.getElementById("brief2").style.opacity= "0";

}

function sbrief(){

document.getElementById("brief2").style.opacity= "1";

}
</script>');
include('header.php');
echo('
<script type="text/javascript">
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
include('feed.php');
echo('
</div>
<div id="content">');
include('config.php');
if(!isset($_COOKIE['iunv_uname'])){
echo('<META HTTP-EQUIV="refresh" CONTENT="0; index">');
}
else{
$uid=$_COOKIE['iunv_id'];
$sql = mysql_query("SELECT * FROM account WHERE id='$uid'");
while($user= mysql_fetch_array($sql))
  {
$email=$user['email'];
$name=$user['fullname'];
$uname=$user['username'];
$created2=$user['created'];
$since=date("D F d Y",$created2);
$gender=$user['gender'];
$pic=$user['avatar'];
switch($gender){
case 1: $gender="Male";break;
case 2: $gender="Female"; break;
default: $gender="Closed"; break;
}
echo('<title> '.$name.' - iunv.social</title>');
if(strlen($pic)<3){
$pic="icon/defaultpic.png";
$pic2="";
}
else{
$pic2='uploads/images/'.$uname.'/thumbnails/';
}

echo('<div id="pro"><a href="propic" id="propi"> Change Photo!</a><img id="propic" src="'.$pic2.$pic.'" style="max-height:150px; max-width: 150px;">');
echo('<div id="info">'.$name.'<br>');
echo($uname.'<br>');
echo($gender.'<br>');
echo($email.'<br>');
echo('Member since: '.$since.'</div></div>');
echo('<div id="oth">');
echo('<div id="tabbar">');
$infoo="onclick=begu('info')";
echo('<div id="tab" '.$infoo.'> Info </div>');
$photoo="onclick=begu('photo')";
echo('<div id="tab" '.$photoo.'> Photos </div>');
$friendo="onclick=begu('friend')";
echo('<div id="tab" '.$friendo.'> Friends </div>');
echo(' </div><div id="sisi" style="display: none;">'.$uname.'</div>');
echo('<div id="conti">');

$sqlmy = mysql_query("SELECT * FROM myopicto WHERE uid='$uid'");
$myo= mysql_fetch_array($sqlmy);
$myopic=$myo['pic'];
if(strlen($myopic)<3){
$myopic="icon/myopicto.gif";
$myopic2="";
echo('<a href="myopicto"><img id="myopi" src="'.$myopic2.$myopic.'" height="320px" width="540px"></a>');

}
else{
$myopic2='uploads/images/'.$uname.'/thumbnails/';
echo('<a href="myopicto?file='.$myopic.'"><img id="myopi" src="'.$myopic2.$myopic.'" height="330px" width="550px"></a>');
}
echo('</div>');
echo('</div>');
}
}
}

echo('<div>
<script type="text/javascript">
ch_client = "asanuj";
ch_width = 550;
ch_height = 90;
ch_type = "mpu";
ch_sid = "dashboard";
ch_color_site_link = "0000CC";
ch_color_title = "0000CC";
ch_color_border = "D6D6D6";
ch_color_text = "000000";
ch_color_bg = "F7F7F7";
</script>
<script src="http://scripts.chitika.net/eminimalls/amm.js" type="text/javascript">
</script>
</div></div>');

echo('
</div>
<div id="holder">');

include('sidebar.php');
echo('
</div>
');

include('footer.php');
echo('
</body>
</html>
');

?>

