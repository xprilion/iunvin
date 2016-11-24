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
echo('<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.tinycarousel.min.js"></script>
<div id="carousel">');
$time=time();
$sql = mysql_query("SELECT * FROM friends WHERE uid='$uid' AND status=2");
$a=0;
$no=mysql_num_rows($sql);
if($no==0){
echo("All your friends' posts shall appear here!
<br>
<br><br>
Oh no! Your friends haven't posted anything yet!");
}
while($frnd= mysql_fetch_array($sql))
  {
$fid=$frnd['fid'];
$sql2 = mysql_query("SELECT * FROM streams WHERE uid='$fid' ORDER BY  `streams`.`time` DESC");

while($streams= mysql_fetch_array($sql2))
  {
++$a;
$slider="#slider".$a;
$stext=$streams['text'];
$suname=$streams['username'];
$sname=$streams['name'];
$sid=$streams['id'];
$sqlxxx=mysql_query("SELECT * FROM likes WHERE sid='$sid'");
$likes=mysql_num_rows($sqlxxx);
$typex=$streams['type'];
switch($typex){
case 1: $type='said';break;
case 2: $type='likes'; break;
case 3: $type='comments'; break;
case 4: $type='uploaded a photo!'; break;
case 5: $type='updated profile'; break;
case 9: $type='updated Myopicto'; break;
}

$sqlxx=mysql_query("SELECT * FROM account WHERE username='$suname'");
$zog=mysql_fetch_assoc($sqlxx);
$pic=$zog['avatar'];
if(strlen($pic)<3){
$pic="icons/defaultpic.png";
$pic2="";
}
else{
$pic2='uploads/images/'.$suname.'/thumbnails/';
}

$sql2xxx=mysql_query("SELECT * FROM comments WHERE sid='$sid'");
$comments=mysql_num_rows($sql2xxx);
echo('<script type="text/javascript">
$(document).ready(function(){
$("'.$slider.'").tinycarousel();	
});
</script>
<style>
'.$slider.' {
 height: 25%;
 overflow:hidden; 
width: 144px; color: #000;
float: right;
 }
'.$slider.' .viewport {
 background: #0f0;
float: left;
width: 150px;
height: 124px;
overflow: hidden;
position: relative;
 }
'.$slider.' .next { 
background-position: 0 0; 
margin: 30px 0 0 10px; 
 }
'.$slider.' .disable { visibility: hidden; }
'.$slider.' .overview { list-style: none;
 position: absolute;
 padding: 0;
 margin: 0;
 width: 240px;
 left: 0 top: 0;
 }
'.$slider.' .overview li{
float: left;
 margin: 0 20px 0 0;
 padding: 1px;
 height: 121px;
 border: 1px solid #dcdcdc;
 width: 140px;}
</style>');
echo('<a href="story?sid='.$sid.'"><div id="slider'.$a.'">
<div class="viewport">
<ul class="overview">
<li><img src="'.$pic2.$pic.'" style="max-height: 120px; max-width: 120px;"></li><li><b><u>'.$sname.' '.$type.'</u></b>: '.$stext.'</li>
<li>Likes: '.$likes.' <br>Comments: '.$comments.' </li>									
</ul>
</div>
</div>');
}
}
}

?>