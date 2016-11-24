<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];

if(isset($_POST['bio'])){
$bio=$_POST['bio'];
$bio = htmlspecialchars($bio, ENT_QUOTES);
mysql_query("UPDATE user_info SET bio='$bio' WHERE uid='$uid'");
if(strlen(trim($bio))>0){
mysql_query("UPDATE user_signup SET bio='1' WHERE uid='$uid'");
}
}
if(isset($_POST['spec'])){
$spec=$_POST['spec'];
$spec= htmlspecialchars($spec, ENT_QUOTES);
mysql_query("UPDATE user_info SET speciality='$spec' WHERE uid='$uid'");
}

if(isset($_POST['exp'])){
$expertise=$_POST['exp'];
$expertise = htmlspecialchars($expertise, ENT_QUOTES);
mysql_query("UPDATE user_info SET expertise='$expertise' WHERE uid='$uid'");
if(strlen(trim($expertise))>0){
mysql_query("UPDATE user_signup SET job='1' WHERE uid='$uid'");
}
}
if(isset($_POST['skul'])){
$school=$_POST['skul'];
$school= htmlspecialchars($school, ENT_QUOTES);
mysql_query("UPDATE user_info SET school='$school' WHERE uid='$uid'");
if(strlen(trim($school))>0){
mysql_query("UPDATE user_signup SET study='1' WHERE uid='$uid'");
}
}
if(isset($_POST['colg'])){
$college=$_POST['colg'];
$college= htmlspecialchars($college, ENT_QUOTES);
mysql_query("UPDATE user_info SET college='$college' WHERE uid='$uid'");
}
if(isset($_POST['univ'])){
$university=$_POST['univ'];
$university = htmlspecialchars($university, ENT_QUOTES);
mysql_query("UPDATE user_info SET university='$university' WHERE uid='$uid'");
}
if(isset($_POST['lang'])){
$language=$_POST['lang'];
$language= htmlspecialchars($language, ENT_QUOTES);
mysql_query("UPDATE user_info SET languages='$language' WHERE uid='$uid'");
if(strlen(trim($language))>0){
mysql_query("UPDATE user_signup SET languages='1' WHERE uid='$uid'");
}
}

echo 'ok';
?>