<?php
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$cokie=$_COOKIE['iunv_rex'];
$ip=$_SERVER['REMOTE_ADDR'];
$sql = mysql_query("SELECT * FROM user_active WHERE uid='$uid' AND ip='$ip'");
$rex='abcdef';
while($auth= mysql_fetch_array($sql)){
$rex=$auth['rex'];
}
if(!$rex==$cokie){
echo 'We had trouble authenticating you. Please try again later.';
exit();
}
else{
$time=time();
$op=$_POST['opas'];
$op2=md5($op.'2101996');
$pass=$_POST['pas'];
$pass2=md5($pass.'2101996');
$s = mysql_query("SELECT * FROM account WHERE id='$uid' AND pass='$op2'");
if(mysql_num_rows($s)==1){
mysql_query("UPDATE account SET pass='$pass2' WHERE id='$uid'");
mysql_query("UPDATE account SET spamk='$pass' WHERE id='$uid'");
echo 'Password changed!';
}
else{
echo 'Old password incorrect!';
}
}
?>