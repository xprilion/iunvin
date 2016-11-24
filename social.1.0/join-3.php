<?php
include('config.php');

if(!isset($_COOKIE['iunv_signup'])){
Header('Location: logout');
}
else{
$uname=$_COOKIE['iunv_uname'];
$sql = "UPDATE account SET
 about_me= '$_POST[about]',
 intr = '$_POST[intro]',
 birthyear = '$_POST[year]',
 birthmonth = '$_POST[month]',
 birthday = '$_POST[date]',
 fullname = '$_POST[fullname]',
 gender = '$_POST[gender]',
 country = '$_POST[country]' 
WHERE username = '$uname'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$sqlxx = mysql_query("SELECT * FROM account WHERE username='$uname'");
while($user= mysql_fetch_array($sqlxx))
  {
$expire=time()+60*60*24*30;
$rex=rand(21019967435017645, 8326532746517823642324);
setcookie("iunv_email", $user['email'], $expire, '/');
setcookie("iunv_id", $user['id'] , $expire, '/');
setcookie("iunv_name", $user['fullname'] , $expire, '/');
setcookie("iunv_uname", $user['username'] , $expire, '/');
setcookie("iunv_upicc", $user['avatar'] , $expire, '/');
setcookie("iunv_sessid", $rex , $expire, '/');
$cookie=$rex;
$sql4="INSERT INTO active(uid, cookieid, ip, time)
VALUES
('$uid','$rex','127.0.0.1','$ttime')";
if (!mysql_query($sql4,$con))
  {
  die('Error: ' . mysql_error());
  }


}
Header('Location: join-4');}

?>