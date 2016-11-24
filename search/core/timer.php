<!DOCTYPE html>
<head>
<title>timer</title></head><body>
<style>
#notif{height: 20px;
width: auto;
padding: 5px;
background: yellow;
display: inline-block;
position: absolute;
top: 0px;
left: 200px;
}

#loading{
display: none;
}

</style>

<script>

function timeit()
{
var url= document.timer.url.value;
var xmlhttp;
if (url.length==" ")
  { 
   document.getElementById("lists").innerHTML=xmlhttp.responseText;

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
    document.getElementById("lists").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("GET","timeitup.php?url="+url+"&act=1",true);
xmlhttp.send();
}

function doit(id)
{

var xmlhttp;
if (id.length==" ")
  { 
   document.getElementById("lists").innerHTML=xmlhttp.responseText;

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
    document.getElementById("lists").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("GET","timeitup.php?id="+id+"&act=2",true);
xmlhttp.send();
}

function undoit(id)
{
var xmlhttp;
if (id.length==" ")
  { 
   document.getElementById("lists").innerHTML=xmlhttp.responseText;

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
    document.getElementById("lists").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("GET","timeitup.php?id="+id+"&act=3",true);
xmlhttp.send();
}


 $(document).ajaxSend(function(event, request, settings) {
   $('#loading').show();
 });
 
 $(document).ajaxComplete(function(event, request, settings) {
   $('#loading').hide();
 });



</script>


<form name="timer" action="" method="get">
<input name="url" type="text" />
</form>
<button onclick="timeit();"> Time it dah! </button>
<div id="loading"><img src="loading.gif"></div>
<div id="lists">
<br>
<?php

include('config.php');
$sql2 = mysql_query("SELECT * FROM timer WHERE status='0' LIMIT 25");

while($timer = mysql_fetch_array($sql2))
  {
$id=$timer['id'];
$url=$timer['url'];
echo($id.'&nbsp; &nbsp; &nbsp;'.$url);echo('&nbsp; &nbsp; &nbsp; &nbsp;');
echo('<button onclick=doit("'.$id.'");> DO it. </button>');
echo('<br>');
}


echo('<br><hr><br>Done...<br>');

$sql2 = mysql_query("SELECT * FROM timer WHERE status='2' LIMIT 25");

while($client = mysql_fetch_array($sql2))
  {
$id=$client['id'];
$url=$client['url'];
echo($id.'&nbsp; &nbsp; &nbsp;'.$url);echo('&nbsp; &nbsp; &nbsp; &nbsp;');
echo('<button onclick=undoit("'.$id.'");> Undo it. </button>');
echo('<br>');
}
?>
</div>