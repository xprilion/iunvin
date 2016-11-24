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
if(!isset($_GET['sid'])){
HEADER('Location: dashboard');
}
else{
echo('
<!DOCTYPE html>
<html>
<head>
<title> Deleting - iunv.social </title>
<script>

function deleteit()
{

');
echo("
var sid=document.getElementById('sid').innerHTML; ");
echo('
var xmlhttp;
if (sid.length==" ")
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
xmlhttp.open("POST","dell.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("sid="+sid);
}
</script>

');
include('header.php');
echo('
<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
$("#notifs").niceScroll();
});
</script>
<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';document.getElementById('resulta').style.display='none';");
echo('">
<div id="story">
');
$sid=$_GET['sid'];
$uid=$_COOKIE['iunv_id'];
include('config.php');

$sql2 = "SELECT * FROM streams WHERE id='$sid' AND uid='$uid'";
$result = mysql_query($sql2) or die('error');
$row = mysql_fetch_assoc($result);
if(!mysql_num_rows($result)) {

echo("Post doesn't exist!");
}

else{
echo('Are you sure you want to delete this post?<hr><br>
<div id="repl" onclick="deleteit()"> Yes </div> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <a href="story?sid='.$sid.'"><div id="repl"> No </div> </a>
<div id="sid" style="display: none;">'.$sid.'</div>');
}
}
echo('
</div>

<div id="holder">

');
include('sidebar.php');
echo('
</div>
</div>
<div id="footer">');
include('footer.php');
echo('</div>
</body>
</html>');
}

?>