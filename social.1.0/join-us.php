<?php
include('config.php');
if(isset($_COOKIE['iunv_sessid']) && isset($_COOKIE['iunv_id'])){
$cokie=$_COOKIE['iunv_sessid'];
$uid=$_COOKIE['iunv_id'];
}
else{
$uid=0;
$cokie=0;
}
$rex=1;
$sql = mysql_query("SELECT * FROM active WHERE id='$uid'");
while($auth= mysql_fetch_array($sql)){
$rex=$auth['cookie'];
}
if(!$rex==$cokie){
if(!isset($_COOKIE['iunv_uname'])){
echo('<!DOCTYPE html>
<html>
<head> <title> Join - iunv </title>');
include('join-head.php');
echo('</head>

<body><div id="header"> <a href="./"><img src="logo.png"></a></div>
<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';");
echo('">
');
if(!isset($_COOKIE['iunv_uname'])){
if(isset($_COOKIE['iunv_exists'])){
if($_COOKIE['iunv_exists'] == 1){
$exists="Username exists!";
echo($exists.'<br>');
}
if($_COOKIE['iunv_exists'] == 2){
$exists="Email exists!";
echo($exists.'<br>');
}
if($_COOKIE['iunv_exists'] == 0){
}
}
echo('<form id="join" style="width: 40%; float: right;" action="join-2" method="post">
<center>
<input id="username" name="username" type="text" placeholder="username" /><br>
<input id="password" name="password" type="password" placeholder="password" /><br>
<input id="email" name="email" type="email" placeholder="abc@xyzmail.com" /> <hr><input id="go" type="submit" value="Join Us!" />
</center>

<br>Already have an account? <a href="login" id="repl">Login</a>
</form>

');
}
echo('</div>
<div id="footer">
&copy; iunv 2013<a href="feedback"><div id="feedback"> Feedback </div></a>
</div>
</body>
</html>
');
}
}
else{
Header('Location: dashboard');
exit();
}
?>