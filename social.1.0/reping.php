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
$sid=$_POST['sid'];
$time=time();
$uid=$_COOKIE['iunv_id'];
$name=$_COOKIE['iunv_name'];
$uname=$_COOKIE['iunv_uname'];
$text=$_POST['con'];
$tri=trim($text);

if(strlen($tri)>0){

$sql="INSERT INTO comments(sid, uid, name, username, time, text)
VALUES
('$sid', '$uid','$name','$uname','$time', '$text')";

if (!mysql_query($sql,$con))
  {
  echo('Error:!'.mysql_error());
  }

$uname=$_COOKIE['iunv_uname'];
$sql2 = mysql_query("SELECT * FROM comments WHERE sid='$sid'");

while($comments= mysql_fetch_array($sql2))
  {
$cid=$comments['id'];
$comment=$comments['text'];
$name=$comments['name'];
$cname=$comments['username'];
$time=$comments['time'];
$date=date("D F d Y",$time);
echo('<li id="commi">');
echo('<b><a href="profile?p='.$cname.'">'.$name.'</a>: </b>');
echo($comment);
echo('<br>');
echo('<div id="time2" class="faded">'.$date.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '); if($uname==$cname){
echo('<a href="comdel?cid='.$cid.'&sid='.$sid.'" class="delll">Delete</a>');}
echo(' </div>');
echo('</li>');
}
$wext= substr($text, 0, 30);
$juxt=$name.' commented on your post: '.$wext.'...';
$sql3="INSERT INTO notifs(sid, uid, time, notif)
VALUES
('$sid', '$uid','$time', '$juxt')";

if (!mysql_query($sql3,$con))
  {
  echo('Error:!'.mysql_error());
  }
}
else{
echo('<img src="icon/cross.png" height="20px"> Oops! Something went wrong!');
}
}
?>