<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];

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
if(isset($_POST['country'])){
$country=$_POST['country'];
$country = htmlspecialchars($country, ENT_QUOTES);
mysql_query("UPDATE user_info SET country='$country' WHERE uid='$uid'");
}
if(isset($_POST['state'])){
$state=$_POST['state'];
$state = htmlspecialchars($state, ENT_QUOTES);
mysql_query("UPDATE user_info SET state='$state' WHERE uid='$uid'");
}
if(isset($_POST['region'])){
$region=$_POST['region'];
$region = htmlspecialchars($region, ENT_QUOTES);
mysql_query("UPDATE user_info SET region='$region' WHERE uid='$uid'");
if(strlen(trim($region))>0){
mysql_query("UPDATE user_signup SET location='1' WHERE uid='$uid'");
}
}
if(isset($_POST['city'])){
$city=$_POST['city'];
$city = htmlspecialchars($city, ENT_QUOTES);
mysql_query("UPDATE user_info SET city='$city' WHERE uid='$uid'");
}
if(isset($_POST['phone'])){
$phone=$_POST['phone'];
$phone = htmlspecialchars($phone, ENT_QUOTES);
mysql_query("UPDATE user_info SET phone='$phone' WHERE uid='$uid'");
if(strlen(trim($phone))>0){
mysql_query("UPDATE user_signup SET phone='1' WHERE uid='$uid'");
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
if(isset($_POST['expertise'])){
$expertise=$_POST['expertise'];
$expertise = htmlspecialchars($expertise, ENT_QUOTES);
mysql_query("UPDATE user_info SET expertise='$expertise' WHERE uid='$uid'");
if(strlen(trim($expertise))>0){
mysql_query("UPDATE user_signup SET job='1' WHERE uid='$uid'");
}
}
if(isset($_POST['school'])){
$school=$_POST['school'];
$school= htmlspecialchars($school, ENT_QUOTES);
mysql_query("UPDATE user_info SET school='$school' WHERE uid='$uid'");
if(strlen(trim($school))>0){
mysql_query("UPDATE user_signup SET study='1' WHERE uid='$uid'");
}
}
if(isset($_POST['college'])){
$college=$_POST['college'];
$college= htmlspecialchars($college, ENT_QUOTES);
mysql_query("UPDATE user_info SET college='$college' WHERE uid='$uid'");
}
if(isset($_POST['university'])){
$university=$_POST['university'];
$university = htmlspecialchars($university, ENT_QUOTES);
mysql_query("UPDATE user_info SET university='$university' WHERE uid='$uid'");
}
if(isset($_POST['language'])){
$language=$_POST['language'];
$language= htmlspecialchars($language, ENT_QUOTES);
mysql_query("UPDATE user_info SET languages='$language' WHERE uid='$uid'");
if(strlen(trim($language))>0){
mysql_query("UPDATE user_signup SET languages='1' WHERE uid='$uid'");
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