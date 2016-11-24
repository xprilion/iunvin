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

var xmlhttp;
if (jee.length==0)
  { 
   document.getElementById("cum"+jee).innerHTML=xmlhttp.responseText;

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
    document.getElementById("cum"+jee).innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","brief.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("p="+jee);
}

function shit(jee){
   document.getElementById("cum"+jee).style.display="none";


}

function hit(jee){
   document.getElementById("cum"+jee).style.display="block";


}



</script>
<div id="bro">');

global $sum, $sum2;
$sum=0;
$sum2=0;
if(isset($_GET['filter'])){

if(isset($_GET['country'])){
$sum2=$sum;
$sum=$sum2+10;
}

if(isset($_GET['age'])){
$sum2=$sum;
$sum=$sum2+100;
}
if(isset($_GET['name'])){
$sum2=$sum;
$sum=$sum2+1000;
}

if(isset($_GET['sex'])){
$sum2=$sum;
$sum=$sum2+10000;
}

echo($sum);

switch($sum){
case 10: country(); break;
case 110: country_age(); break;
case 1110: country_age_name(); break;
case 11110: country_age_name_sex(); break;
case 100: age(); break;
case 1100: age_name(); break;
case 11100: age_name_sex(); break;
case 1000: name(); break;
case 11000: name_sex(); break;
case 1010: country_name(); break;
case 10000: sex(); break;
case 10100: age_sex(); break;
case 10010: country_sex(); break;
case 11010: country_name_sex(); break;
case 10110: country_age_sex(); break;
}


}

else{
$b=0;
$sqlo = mysql_query("SELECT * FROM `account` LIMIT 0, 30");
$a=mysql_num_rows($sqlo);
while($b<$a){
++$b;
oper($b);
}
}
}

function oper($b){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$sql = mysql_query("SELECT * FROM `account` WHERE id='$b' LIMIT 0, 30");
while($user= mysql_fetch_array($sql)){
$name=$user['fullname'];
$uname=$user['username'];
$id=$user['id'];

$pic=$user['avatar'];
if(strlen($pic)<3){
$pic="icon/defaultpic.png";
$pic2="";
}
else{
$pic2='uploads/images/'.$uname.'/thumbnails/';
}
$location=$user['country'];

echo('<div id="cum'.$uname.'"><a href="profile?p='.$uname.'"><img src="'.$pic2.$pic.'" style="max-height: 120px; max-width: 120px;"><div id="nam">'.$name.'</div></a><div id="morei"  onclick=olykix("'.$uname.'");>More</div></div>');

echo('<hr>');

}
}



?>