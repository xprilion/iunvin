<?php if(isset($_COOKIE['iunv_uname'])){
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
echo('<!DOCTYPE html>
<html>
<head> <title> Messages - iunv.social </title>
<script>

function mreadi(mid)
{
var unread=document.getElementById("inNum").innerHTML;
if(unread>0){
var nunread=unread-1;
}
else{
nunread=" ";
}
var xmlhttp;
if (mid.length==" ")
  { 
   document.getElementById("mres").innerHTML=xmlhttp.responseText;


 document.getElementById("inNum").innerHTML="("+nunread+")";

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
    document.getElementById("mres").innerHTML=xmlhttp.responseText;
 document.getElementById("inNum").innerHTML=nunread;


  }
xmlhttp.open("GET","mread.php?mid="+mid ,true);
xmlhttp.send();
}

function mread(mid)
{

var xmlhttp;
if (mid.length==" ")
  { 
   document.getElementById("mres").innerHTML=xmlhttp.responseText;

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
    document.getElementById("mres").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("GET","mread.php?mid="+mid ,true);
xmlhttp.send();
}

function inbox()
{
var mid="asdasd";
var xmlhttp;
if (mid.length==" ")
  { 
   document.getElementById("mres").innerHTML=xmlhttp.responseText;

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
    document.getElementById("mres").innerHTML=xmlhttp.responseText;
document.getElementById("m1").className="mactive";
document.getElementById("m2").className=" ";
document.getElementById("m3").className=" ";
document.getElementById("m4").className=" ";
document.getElementById("m5").className=" ";
  }
xmlhttp.open("GET","min.php" ,true);
xmlhttp.send();
}

function drafts()
{
var mid="asdasd";
var xmlhttp;
if (mid.length==" ")
  { 
   document.getElementById("mres").innerHTML=xmlhttp.responseText;

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
    document.getElementById("mres").innerHTML=xmlhttp.responseText;
document.getElementById("m2").className="mactive";
document.getElementById("m1").className=" ";
document.getElementById("m3").className=" ";
document.getElementById("m4").className=" ";
document.getElementById("m5").className=" ";
  }
xmlhttp.open("GET","mdraft.php" ,true);
xmlhttp.send();
}


function sent()
{
var mid="asdasd";
var xmlhttp;
if (mid.length==" ")
  { 
   document.getElementById("mres").innerHTML=xmlhttp.responseText;

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
    document.getElementById("mres").innerHTML=xmlhttp.responseText;
document.getElementById("m3").className="mactive";
document.getElementById("m2").className=" ";
document.getElementById("m1").className=" ";
document.getElementById("m4").className=" ";
document.getElementById("m5").className=" ";
  }
xmlhttp.open("GET","msent.php" ,true);
xmlhttp.send();
}


function trash()
{
var mid="asdasd";
var xmlhttp;
if (mid.length==" ")
  { 
   document.getElementById("mres").innerHTML=xmlhttp.responseText;

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
    document.getElementById("mres").innerHTML=xmlhttp.responseText;
document.getElementById("m4").className="mactive";
document.getElementById("m2").className=" ";
document.getElementById("m3").className=" ";
document.getElementById("m1").className=" ";
document.getElementById("m5").className=" ";
  }
xmlhttp.open("GET","mtrash.php" ,true);
xmlhttp.send();
}


function mdel(mid)
{

var xmlhttp;
if (mid.length==" ")
  { 
   document.getElementById("mres").innerHTML=xmlhttp.responseText;

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
    document.getElementById("mres").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("GET","mdel.php?mid="+mid ,true);
xmlhttp.send();
}


</script>');
include('header.php');
echo('<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
$("#min").niceScroll();
$("#notifs").niceScroll();
});
</script><div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';");
echo('">
<div id="mframe">
<div id="mact">
</div>
<div id="mnav">');
$sql = mysql_query("SELECT * FROM messages WHERE uid='$uid' AND seen='0' AND type='1'" );
$num2=mysql_num_rows($sql);
if($num2==0){
$num=" ";
}
else{
$num="(".$num2.")";
}
echo('<li id="m1" onclick="inbox();"> Inbox<div id="inNum" style="display: inline;"><?php echo($num); ?></div></li>
<li id="m2" onclick="drafts();"> Drafts </li>
<li id="m3" onclick="sent();"> Sent </li>
<li id="m4" onclick="trash();"> Trash </li>
<a href="message.php"><li id="m5"> New </li></a>
</div>
<div id="mres">');
include('min.php');
echo('</div>
</div>
</div>
<div id="holder">');
include('sidebar.php');
echo('</div>
</div>
<div id="footer">');
include('footer.php');
echo('</div>
</body>
</html>');
}
}
?>