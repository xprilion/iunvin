<?php
include('config.php');
error_reporting(0);
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
echo('<form id="join" action="join-2" method="post">
<input id="username" name="username" type="text" placeholder="username" /><br>
<input id="password" name="password" type="password" placeholder="password" /><br>
<input id="email" name="email" type="email" placeholder="abc@xyzmail.com" /> <hr><input id="go" type="submit" value="Join Us!" />
</form>');
}

?>