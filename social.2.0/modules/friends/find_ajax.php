<?php
$q=$_POST['term'];
include('../../config.php');
include('friendship.php');

$e=mysql_query("SELECT * FROM account WHERE name LIKE '%$q%' OR username LIKE '%$q%' LIMIT 0, 30");
while($p=mysql_fetch_assoc($e)){
$yid=$p['id'];
$er=mysql_query("SELECT * FROM user_settings WHERE uid='$yid'");
if(mysql_num_rows($er)==0){
prof($yid);
}
else{
$dr=mysql_fetch_assoc($er);
$per=$dr['search'];
if($per=='1'){
prof($yid);
}
}
}
?>