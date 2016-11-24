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
<title> Feedback - iunv.social </title>
<script>

function telling(suggest)
{
var uid=document.getElementById("uid").innerHTML;
var xmlhttp;
if (uid.length==" ")
  { 
   document.getElementById("lop").innerHTML=xmlhttp.responseText;

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
    document.getElementById("lop").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","feedbacki.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("uid="+uid+"&sug="+suggest);
}

function urlrep()
{


var uid=document.getElementById("uid").innerHTML;
var juk=document.url.rul.value;
var xmlhttp;
if (uid.length==" ")
  { 
   document.getElementById("lop").innerHTML=xmlhttp.responseText;

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
    document.getElementById("lop").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","brokenlink.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("uid="+uid+"&link="+juk);
}
function sug()
{
var uid=document.getElementById("uid").innerHTML;
var jukx=document.suggest.rul.value;
var xmlhttp;
if (uid.length==" ")
  { 
   document.getElementById("lop").innerHTML=xmlhttp.responseText;

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
    document.getElementById("lop").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","suggestion.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("uid="+uid+"&sug="+jukx);
}
function oth()
{
var uid=document.getElementById("uid").innerHTML;
var jukx=document.suggest.rul.value;
var xmlhttp;
if (uid.length==" ")
  { 
   document.getElementById("lop").innerHTML=xmlhttp.responseText;

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
    document.getElementById("lop").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","other.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("uid="+uid+"&sug="+jukx);
}
</script>');
include('header.php');
echo('<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
$("#notifs").niceScroll();
});
</script>
<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';");
echo('">
<div id="jframe">
Thankyou for giving us some of your valuable time!<hr><br>
<div id="lop">
What would you like to do?<br><br>
<div id="brokenlink" onclick="telling');
echo("('1')");
echo('" class="fback"> Broken Link </div>
<div id="suggestion" onclick="telling');
echo("('2')");
echo('" class="fback"> Suggestion </div>
<div id="problemx" onclick="telling');
echo("('3')");
echo('" class="fback"> Other </div>
</div>
<div id="uid" style="display: none;">'.$uid.'</div>
</div>
</div>
<div id="footer">');
include('footer.php');
echo('</div>
</body>
</html>');
}
?>