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
$sname=$_GET['sname'];
$subject=$_GET['subject'];
$text2=$_GET['text'];
$text = htmlspecialchars($text2, ENT_QUOTES);
$tri=trim($text);
$time=time();
if(strlen($tri)>0){
$uid=$_COOKIE['iunv_id'];
$sql = mysql_query("SELECT * FROM account WHERE username='$sname'" );
while($user= mysql_fetch_array($sql))
  {
$tid=$user['id'];
$sql2="INSERT INTO messages(uid, tid, text, subject, time, seen, mid, type)
VALUES
('$uid','$tid','$text', '$subject', '$time', '0', '0', '2')";
if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
$sql = mysql_query("SELECT * FROM messages WHERE uid='$uid' AND time='$time'" );
while($msg= mysql_fetch_array($sql))
  {
$mid=$msg['id'];
$sql3="INSERT INTO messages(uid, tid, text, subject, time, seen, mid, type)
VALUES
('$tid','$uid','$text', '$subject', '$time', '0', '$mid', '1')";
if (!mysql_query($sql3,$con))
  {
  die('Error: ' . mysql_error());
  }
}
}
echo('Your message has been sent!');
}
else{
echo('Ahh! That message was too small to be wrothy of being sent!'); 
}
}
?>