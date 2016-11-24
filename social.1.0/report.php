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
echo('<!DOCTYPE html>
<html>
<head>
<title> Reporting - iunv.social </title>
<script>

function reporting(reason)
{
var sid=document.getElementById("sid").innerHTML;
var xmlhttp;
if (reason.length==1)
  { 
   document.getElementById("story").innerHTML=xmlhttp.responseText;

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
    document.getElementById("story").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","repor.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("sid="+sid+"&rea="+reason);
}
</script>


<script>

function reporto()
{


var sid=document.getElementById("sid").innerHTML;
var reason=document.report.reasonx.value;
var tip=document.getElementById("tt").innerHTML;
var xmlhttp;
if (reason.length==1)
  { 
   document.getElementById("story").innerHTML=xmlhttp.responseText;

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
    document.getElementById("story").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","reporo.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("sid="+sid+"&rea="+reason+"&type="+tip);
}
</script>');
include('header.php');
echo('</div>
<div id="wall" onclick="document.getElementById(');
echo("'menu').style.display='none';document.getElementById('resulta').style.display='none';");
echo('">
<div id="story">');

if(!isset($_GET['sid'])){
HEADER('Location: dashboard.php');
}
else{
$sid=$_GET['sid'];
$uid=$_COOKIE['iunv_id'];
include('config.php');
$sql2 = "SELECT * FROM reports WHERE sid='$sid' AND uid='$uid'";
    $result = mysql_query($sql2) or die('error');
    $row = mysql_fetch_assoc($result);
    if(mysql_num_rows($result)) {
echo('You have already reported this post!');
}
else{

echo('Why do you find this <a href="story?sid='.$sid.'">story</a> objectionable?<hr><br>
<form name="report" method="post" action="report.php">
<input type="radio" name="reason" value="10" onclick="reporting(this.value)"> Pornography <br>
<input type="radio" name="reason" value="20" onclick="reporting(this.value)"> Abusing <br>
<input type="radio" name="reason" value="30" onclick="reporting(this.value)"> Unsocial launguage <br>
<input type="radio" name="reason" value="40" onclick="reporting(this.value)"> Child abuse <br>
<input type="radio" name="reason" value="50" onclick="reporting(this.value)"> Threat to privacy <br>
</form>
</div></div><div id="sid" style="display: none;">'.$sid.'</div>');
}
}
echo('<div id="holder">');
include('sidebar.php');
echo('</div></div>
<div id="footer">');
include('footer.php');
echo('</div>
</body>
</html>');
}
?>