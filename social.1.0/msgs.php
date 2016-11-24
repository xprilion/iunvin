<?php
include('config.php');
$cokie=$_COOKIE['iunv_sessid'];
$uid=$_COOKIE['iunv_id'];
$rex=1;
$sql = mysql_query("SELECT * FROM active WHERE id='$uid'");
while($auth= mysql_fetch_array($sql)){
$rex=$auth['cookie'];
}
if(!$rex==$cokie){
Header('Location: log-in');
exit();
}
else{
echo('<a href="messages">');
$sql = mysql_query("SELECT * FROM messages WHERE uid='$uid' AND seen='0'" );
if(mysql_num_rows($sql)>0){
echo('<img src="icon/message.png" alt="You have no new messages!" height="40px">');
}
else{
echo('<img src="icon/no_message.png" alt="Messages!!!" height="40px">');
}
echo('</a>');
}
?>
