
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

<div id="login">


<div id="msg"> </div><form name="losgin" action="loginprocess.php" method="post">
<input id="username" placeholder="username" type="text" name="username" /><br>
<input id="password" placeholder="password" type="password" name="password" /><hr>
<input type="submit" style="display: none;" value="Login">
</form>

<button onclick="login();" id="go" > Login </button>

</div>
