<?php

if(!isset($_COOKIE['iunv_uname'])){

?>

<!DOCTYPE html>
<html>
<head> <title> Login - iunv.social </title>
<link rel="shortcut icon" href="icon/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="base.css">
</head><body><div id="header"> <a href="/"><img src="logo.png"></a></div>
<div id="wall" onclick="document.getElementById('menu').style.display='none';">

You must be logged in to view this!
<hr>

<script>

function login()
{
var fid=document.losgin.username.value;
var fid2=document.losgin.password.value;

var xmlhttp;
if (fid.length==1)
  { 
   document.getElementById("msg").innerHTML=xmlhttp.responseText;

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
    document.getElementById("msg").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","loginprocess.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("username="+fid+"&password="+fid2);
}
</script>
<center>
<div id="login" style="height: 400px; width: 50%;">


<div id="msg"> </div><form name="losgin" action="loginprocess.php" method="post">
<input id="username" placeholder="username" type="text" name="username" /><br>
<input id="password" placeholder="password" type="password" name="password" /><hr>
<input type="submit" style="display: none;" value="Login">
</form>

<button onclick="login();" id="go" > Login </button><hr>
<a id="repl" href="join-us">Create an account</a>
</div>


</div>
</center>

<div id="footer">
&copy; iunv 2013<a href="feedback.php"><div id="feedback"> Feedback </div></a>
</div>



</body>
</html>


<?php

}

else

{

HEADER('Location: dashboard');
}
?>