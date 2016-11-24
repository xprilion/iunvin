
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
}
else{
if(!isset($_GET['cid'])){
HEADER('Location: dashboard');
}
else{
echo('<!DOCTYPE html>
<html>
<head>

<script>

function deleteit()
{
var cid=document.getElementById("cid").innerHTML;
var xmlhttp;
if (cid.length==" ")
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
xmlhttp.open("POST","codell.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("cid="+cid);
}
</script>

');
include('header.php');
echo('<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';document.getElementById('resulta').style.display='none'");
echo(';">
<div id="story">');
$sid=$_GET['sid'];
$cid=$_GET['cid'];
$uid=$_COOKIE['iunv_id'];
include('config.php');
$sql2 = "SELECT * FROM comments WHERE id='$cid' AND uid='$uid'";
$result = mysql_query($sql2) or die('error');
$row = mysql_fetch_assoc($result);
if(!mysql_num_rows($result)) {

echo("Comment doesn't exist!");
}

else{

echo('Are you sure you want to delete this comment?<hr><br>
<div id="repl" onclick="deleteit()"> Yes </div> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <a href="story.php?sid='.$sid.'"><div id="repl"> No </div> </a>
<div id="cid" style="display: none;">'.$cid.'</div>');
}
}

echo('</div>
<div id="footer">');
include('footer.php');
echo('</div>');
echo('<div id="holder">');
include('sidebar.php');
echo('</div>

</div>
</body>
</html>');
}

?>