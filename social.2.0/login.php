<?php

include('config.php');
$username=$_POST['username'];
$password2=$_POST['password'];
$password=md5($password2.'salt');
if(strlen($username) < 3){
echo('Username too small!');
}
else{
if(strlen($password)<3){
echo('Password too small!');
}
else{
$sql2 = "SELECT * FROM account WHERE username='$username'";
    $result = mysql_query($sql2) or die('Error: ' . mysql_error());
    $row = mysql_fetch_assoc($result);
    if(mysql_num_rows($result)) {
$sql = mysql_query("SELECT * FROM account WHERE username='$username' AND pass='$password'");
while($user= mysql_fetch_array($sql))
  {
$prk=rand(-9999999999999999999999999, 9999999999999999999999999999);
$pk=md5($prk.'tiny');
$rex=rand(21019968318273182, 11219967428374832743);
$expire=time()+60*60*24*30;
setcookie("iunv_email", $user['email'], $expire, '/');
setcookie("iunv_id", $user['id'] , $expire, '/');
setcookie("iunv_name", $user['name'] , $expire, '/');
setcookie("iunv_uname", $user['username'] , $expire, '/');
setcookie("iunv_upicc", $user['propic'] , $expire, '/');
setcookie("iunv_rex", $rex , $expire, '/');
setcookie("iunv_pk", $pk , $expire, '/');
$time=time();
$uid=$user['id']
;
$trackid=$user['trackid'];
$ip=$_SERVER['REMOTE_ADDR'];
if (!mysql_query("INSERT INTO user_active(uid, rex, trackid, ip, last) VALUES ('$uid','$rex','$trackid','$ip', '$time')",$con))
  {
  die('Error: ' . mysql_error());
  }
echo 'dashboard';
}
if(mysql_num_rows($sql)==0){
$expire=time()+60*60*24*30;
setcookie("iunv_wrong", 'Wrong Password!', $expire);
echo('Wrong Password!');
}
}
else{
echo('User not found! ');
}

}

}
?>