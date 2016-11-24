<?php

include('../../config.php');
$req=$_POST['req'];
$uid=$_COOKIE['iunv_id'];
$r=mysql_query("SELECT * FROM user_settings WHERE uid='$uid'");
if(mysql_num_rows($r)==0){
mysql_query("INSERT INTO user_settings (uid, $req) VALUES ('$uid', '0')");
echo 'ok';
}
else{
$q=mysql_fetch_assoc($r);
$st=$q[$req];
if($st==0){
$pt=1;

}
else{
$pt=0;
}
mysql_query("UPDATE user_settings SET $req='$pt' WHERE uid='$uid'");
echo 'ok';
}
?>