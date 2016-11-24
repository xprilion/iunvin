<?php
include('config.php');
check();
//getting the next url in queue
function check(){
include('config.php');
$check= mysql_query("SELECT * FROM timer WHERE status='0'");
if(mysql_num_rows($check)>0){
$cli = mysql_fetch_assoc($check);
$uree=$cli['url'];
$uid=$cli['id'];
if(strlen($uree) > 4){
include('process.php');
process($uree);
mysql_query("UPDATE timer SET status = '2' WHERE url = '$uree'");
}
else{
mysql_query("DELETE FROM timer WHERE id='$uid'");
check();
}
}
else{
}
}
?>

