<?php
include('rock.php');
if(!isset($_COOKIE['findu'])){
if((!isset($_GET['user'])) && (!isset($_GET['pass']))){
echo('<form name="login" action="" method="get">
<input type="text" name="user" id="username" />
<input type="password" name="pass" id="password" />
<input type="submit" value="Login" id="submit" />
');
}
else{
$user=$_GET['user'];
$pass=$_GET['pass'];
login($user, $pass);
HEADER('Location: index');
}
}
else{
HEADER('Location: index');
}
?>