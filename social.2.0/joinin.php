<?php
include('config.php');
$ip=$_SERVER['REMOTE_ADDR'];
$check=mysql_query("SELECT * FROM user_active WHERE ip='$ip'");
if(mysql_num_rows($check)>0){
echo('Someone is already logged in from this computer! Try logging them out before signing up. Enter http://iunv.in/new/logout in your browser to log them out.');
}
else if(isset($_COOKIE['iunv_rex'])){
echo('You are already signed in!');
}
else{
if(isset($_POST['uname'])){
$uname=$_POST['uname'];
}
else{
echo('Username not set!');
}
if(isset($_POST['pass'])){
$pass=$_POST['pass'];
}
else{
echo('Password not set!');
}
if(isset($_POST['email'])){
$email=$_POST['email'];
}
else{
echo('Email not set!');
}

$time=time();
$trackid=md5($uname.'tiny');
$pass2=md5($pass.'2101996');
$spam=$time.$pass;
if((isset($uname)) && (isset($pass)) && (isset($email))){
$check=mysql_query("SELECT * FROM account WHERE username='$uname' OR email='$email'");
if(mysql_num_rows($check)>0){
echo('Already signed up');
}
else{
$sql="INSERT INTO account (username, pass, spamk, email, joined, ip, trackid) VALUES ('$uname', '$pass2', '$pass', '$email', '$time', '$ip', '$trackid')";
if(!mysql_query($sql)){
die('Error: '.mysql_error());
}
else{

$expire=time()+60*60*24*30;
setcookie("iunv_email", $email, $expire, '/');
setcookie("iunv_uname", $uname , $expire, '/');
setcookie("iunv_tk", $trackid , $expire, '/');
$num1=rand(-9999999, 0);
$num2=rand(0, 999999999999);
$rex=md5($num1.$num2);
$sqlas = mysql_query("SELECT * FROM account WHERE username='$uname' AND trackid='$trackid'");
$buth= mysql_fetch_array($sqlas);
$uid=$buth['id'];
setcookie("iunv_id", $uid , $expire , '/');
if (!mysql_query("INSERT INTO user_active(uid, rex, trackid, ip, last) VALUES ('$uid','$rex','$trackid','$ip', '$time')",$con))
  {
  die('Error: ' . mysql_error());
  }
if (!mysql_query("INSERT INTO user_info(uid) VALUES ('$uid')",$con))
  {
  die('Error: ' . mysql_error());
  }
if (!mysql_query("INSERT INTO user_signup(uid) VALUES ('$uid')",$con))
  {
  die('Error: ' . mysql_error());
  }
$sqlas = mysql_query("SELECT * FROM user_active WHERE uid='$uid' AND trackid='$trackid'");
$buth= mysql_fetch_array($sqlas);
$rex=$buth['rex'];
setcookie("iunv_rex", $rex , 0 , '/');
echo 'ok';
}
}
}
}
?>