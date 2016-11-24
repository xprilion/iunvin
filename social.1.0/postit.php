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

if(!isset($_POST['stream'])){
$url=$_POST['url'];
HEADER('Location: '.$url);
}

else{

$time=time();
$uid=$_COOKIE['iunv_id'];
$name=$_COOKIE['iunv_name'];
$uname=$_COOKIE['iunv_uname'];
$text2=$_POST['stream'];
$text = htmlspecialchars($text2, ENT_QUOTES);
$tri=trim($text);

if(strlen($tri)>0){

$sql="INSERT INTO streams(uid, name, username, time, text, type)
VALUES
('$uid','$name','$uname','$time', '$text', 1)";

if (!mysql_query($sql,$con))
  {
  echo('Error:!'.mysql_error());
  }
echo('<img src="icon/tick.png" height="20px"> Posted!');
include('texter.php');

$sql=mysql_query("SELECT * FROM streams WHERE text='$text' AND time='$time' ");

while($stri= mysql_fetch_array($sql))
  {

$sid=$stri['id'];


textit($text, $sid);
}


}

else{
echo('<img src="icon/cross.png" height="20px"> Oops! Something went wrong!');
}
}
}

?>