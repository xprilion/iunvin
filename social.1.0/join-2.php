<?php
error_reporting(0);
include('config.php');
if((!isset($_POST['username'])) || (!isset($_POST['email'])) || (!isset($_POST['password']))){
HEADER('Location: logout');
}
else{
$uname=$_POST['username'];
$email=$_POST['email'];
$password2=$_POST['password'];
$password=md5($password2.'2101996');
$sql = "SELECT * FROM account WHERE username = '$uname'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
if(mysql_num_rows($result)>0) {
$expire=time()+60*60*24*30;
setcookie("iunv_exists", '1' , $expire);
HEADER('Location: join-us');
exit();
}

else{

$sql = "SELECT * FROM account WHERE email= '$email'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    if(mysql_num_rows($result)>0) {
$expire=time()+60*60*24*30;
setcookie("iunv_exists", '2' , $expire);
HEADER('Location: join-us');
exit();
   }

else{

$ttime=time();
$expire=time()+60*60*24*30;

setcookie("iunv_email", $email, $expire);
setcookie("iunv_uname", $uname , $expire);
setcookie("iunv_signup", 'true' , $expire);
$uname=$_POST['username'];
$email=$_POST['email'];
$sql="INSERT INTO account(username, email, password, created)
VALUES
('$uname','$email','$password','$ttime')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


$sqlas = mysql_query("SELECT * FROM account WHERE username='$uname'");
while($buth= mysql_fetch_array($sqlas)){
$uid=$buth['id'];
setcookie("iunv_id", $uid , $expire, '/');
}
HEADER('Location: join-2.5');
}
}
}

?>

