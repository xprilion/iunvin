<?php

include('config.php');

$username=$_POST['username'];
$password2=$_POST['password'];
$password=md5($password2.'2101996');
if(strlen($username) < 3){
echo('Username too small!');
}
else{
if(strlen($password)<3){
echo('Password too small!');
}
else{
$sql2 = "SELECT * FROM account WHERE username='$username'";
    $result = mysql_query($sql2) or die('error');
    $row = mysql_fetch_assoc($result);
    if(mysql_num_rows($result)) {
$sql = mysql_query("SELECT * FROM account WHERE username='$username' AND password='$password'");
while($user= mysql_fetch_array($sql))
  {
$rex=rand(21019968318273182, 11219967428374832743);
$expire=time()+60*60*24*30;
setcookie("iunv_email", $user['email'], $expire, '/');
setcookie("iunv_id", $user['id'] , $expire, '/');
setcookie("iunv_name", $user['fullname'] , $expire, '/');
setcookie("iunv_uname", $user['username'] , $expire, '/');
setcookie("iunv_upicc", $user['avatar'] , $expire, '/');
setcookie("iunv_sessid", $rex , $expire, '/');
$time=time();
$uid=$user['id']
;
$cookie=$rex;
$sql4="INSERT INTO active(uid, cookieid, ip, time)
VALUES
('$uid','$rex','127.0.0.1','$time')";
if (!mysql_query($sql4,$con))
  {
  die('Error: ' . mysql_error());
  }
HEADER('Location: redir');
exit();
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