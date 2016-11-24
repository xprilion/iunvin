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
echo('<style>
#post{
min-height: 33px;
text-indent: 6px;
width: 280px;
display: inline-block;
outline: none;
border: 3px;
}
#post:focus{
outline: none;
}
#posting{
background: rgb(229, 6, 238);
}
</style>
<script>

function showHint()
{
var str= document.test.stream.value;
var xmlhttp;
if (str.length==1)
  { 
   document.getElementById("result").innerHTML=xmlhttp.responseText;

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
    document.getElementById("result").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","postit.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("stream="+str);
}
</script>

<form name="test" id="posting">
<input type="text" id="post" name="stream" placeholder="How are you doing?"/>
</form>
<div onclick="showHint();" style="
display: inline-block;
height: 15px;
width: 40px;
margin: 0px;
position: absolute;
right: 0px;
top: 0px;
text-align: center;
padding: 10px;
cursor: pointer;
border: 0px;
background: #12cdff;
box-shadow: 0px 0px 20px 0px #000;
"> Post </div> <div id="result" style="background:rgba(46, 255, 18, 0.45);"></div>');
}
?>