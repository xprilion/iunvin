<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$pp=$_COOKIE['iunv_pp'];

if($pp){
if(strlen(trim($pp))>0){
mysql_query("UPDATE account SET propic='$pp' WHERE id='$uid'");
mysql_query("UPDATE user_signup SET popic='1' WHERE uid='$uid'");
}
}


if(isset($_POST['fullname'])){
$name=$_POST['fullname'];
$name = htmlspecialchars($name, ENT_QUOTES);
mysql_query("UPDATE account SET name='$name' WHERE id='$uid'");
if(strlen(trim($name))>0){
mysql_query("UPDATE user_signup SET name='1' WHERE uid='$uid'");
}
}
if(isset($_POST['dob'])){
$dob=$_POST['dob'];
$dob = htmlspecialchars($dob, ENT_QUOTES);
mysql_query("UPDATE user_info SET dob='$dob' WHERE uid='$uid'");
if(strlen(trim($dob))>0){
mysql_query("UPDATE user_signup SET dob='1' WHERE uid='$uid'");
}
}
if(isset($_POST['job'])){
$job=$_POST['job'];
$job= htmlspecialchars($job, ENT_QUOTES);
mysql_query("UPDATE user_info SET proffession='$job' WHERE uid='$uid'");
if(strlen(trim($job))>0){
mysql_query("UPDATE user_signup SET job='1' WHERE uid='$uid'");
}
}
if(isset($_POST['martial'])){
$martial=$_POST['martial'];
$martial= htmlspecialchars($martial, ENT_QUOTES);
mysql_query("UPDATE user_info SET martial='$martial' WHERE uid='$uid'");
if(strlen(trim($martial))>0){
mysql_query("UPDATE user_signup SET martial='1' WHERE uid='$uid'");
}
}
echo 'ok';
?>