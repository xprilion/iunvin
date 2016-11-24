<?php if(isset($_COOKIE['iunv_uname'])){
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
$text=$_GET['text'];
$time=time();
$sql = mysql_query("SELECT * FROM account WHERE username='$sname'" );
while($user= mysql_fetch_array($sql))
  {
$tid=$user['id'];
$sql2="INSERT INTO messages(uid, tid, text, subject, time, seen, mid, type)
VALUES
('$uid','$tid','$text', '$subject', '$time', '0', '0', '3')";
if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
}
echo('Your message has been saved!');
}
}
?>