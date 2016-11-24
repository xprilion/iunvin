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
echo('<div id="min">');
$mid=$_GET['mid'];
$sql = mysql_query("SELECT * FROM messages WHERE id='$mid'" );
while($msgs= mysql_fetch_array($sql))
  {
$frid=$msgs['tid'];
$text2=$msgs['text'];
$text=htmlspecialchars_decode($text2, ENT_NOQUOTES);
$sub=$msgs['subject'];
$time=$msgs['time'];
$hours = date("d.m.y : H:i", $time);  
$sql2 = mysql_query("SELECT * FROM account WHERE id='$frid'" );
while($user= mysql_fetch_array($sql2))
  {
$sname=$user['fullname'];
$suname=$user['username'];
echo('<div id="mdel" onclick=mdel("'.$mid.'") > Delete </div>');
echo('<b><a href="profile.php?p='.$suname.'">'.$sname.'</a></b><div id="time" class="faded">'.$hours.'</div><hr>'.$sub.'<hr>');
echo($text);

}
}

$sql3="UPDATE messages SET seen='1' WHERE uid='$uid' AND id='$mid'";

if (!mysql_query($sql3,$con))
  {
  die('mysql Error: ' . mysql_error());
  }


echo('
</div>');
}}
?>