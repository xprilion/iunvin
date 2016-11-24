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
echo('<script>
function wonko()
{
var sidb=document.getElementById("sisi").innerHTML;
var capx = document.goko.kapti.value;
var xmlhttp;
if (capx.length==1)
  { 
   document.getElementById("caption").innerHTML=xmlhttp.responseText;

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
    document.getElementById("caption").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","caption.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("cap="+capx+"&sid="+sidb);
document.goko.kapti.value=" ";
}

</script>
<script>
function view(id)
{
var xmlhttp;
if (id.length==" ")
  { 
   document.getElementById("shot").innerHTML=xmlhttp.responseText;

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
    document.getElementById("shot").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("GET","photoviewer.php?sid="+id ,true);
xmlhttp.send();
}
</script>

<style>
#viewit{
height: auto;
width: auto;
position: fixed;
left: 400px;
padding: 0.5em;
display: block;
-webkit-box-shadow: 0px 0px 70px 0px #1299dd inset;
border-radius: 4px;
}
</style>
<div id="carousel">');
$uname=$_COOKIE['iunv_uname'];
$uid=$_COOKIE['iunv_id'];
if(!isset($_COOKIE['iunv_upicc'])){
$upicc=" ";
}
else{
$upicc=$_COOKIE['iunv_upicc'];
}
$sql2 = mysql_query("SELECT * FROM uploads WHERE uid='$uid' AND type='images'");
while($user= mysql_fetch_array($sql2)){
$image=$user['url'];
$iid=$user['sid'];
$path='uploads/images/'.$uname.'/thumbnails/'.$image;
if($image==$upicc)
{
echo('<div id="tick"><img src="icon/tick.png" height="20px" title="This is your current profile picture."> </div>');
}
 echo('<div id="pho"');
echo('onclick=view("'.$iid.'")');
echo('><img style="max-width:200px; max-height:200px; " src="'.$path.'"><br><hr></div>');

}
if(mysql_num_rows($sql2)==0){
echo("Oh no! You have don't have any photo in your album! Try uploading one!");
}
echo('</div>');
}
?>