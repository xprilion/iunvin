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
echo('
<div id="carousel">');
$sql = mysql_query("SELECT * FROM streams WHERE uid='$uid' ORDER BY  `streams`.`time` DESC ");
$a=0;
while($streams= mysql_fetch_array($sql))
  {
++$a;
$stext=$streams['text'];
$sid=$streams['id'];
$sname=$streams['username'];
$typex=$streams['type'];
$time=$streams['time'];
$when=date("D F d Y",$time);

$sql2xxx=mysql_query("SELECT * FROM comments WHERE sid='$sid'");
$comments=mysql_num_rows($sql2xxx);
switch($typex){
case 1: $type='said';break;
case 2: $type='likes'; break;
case 3: $type='comments'; break;
case 4: $type='uploaded a pic!'; break;
case 5: $type='updated your profile!'; break;
case 9: $type='updated your Myopicto!'; break;
}

$sqlxxx=mysql_query("SELECT * FROM likes WHERE sid='$sid'");
$likes=mysql_num_rows($sqlxxx);

$sqlxx=mysql_query("SELECT * FROM account WHERE username='$sname'");
$zog=mysql_fetch_assoc($sqlxx);
$pic=$zog['avatar'];
if(strlen($pic)<3){
$pic="icon/defaultpic.png";
$pic2="";
}
else{
$pic2='uploads/images/'.$sname.'/thumbnails/';
}

if($typex==4){
$sqlo = mysql_query("SELECT * FROM uploads WHERE id='$sid'");
while($pho= mysql_fetch_array($sqlo))
  {
$puc=$pho['url'];
}
}

else if($typex==5){
$sqlo = mysql_query("SELECT * FROM uploads WHERE id='$sid'");
while($pho= mysql_fetch_array($sqlo))
  {
$puc=$pho['url'];
}
}

else if($typex==9){
$sqlo = mysql_query("SELECT * FROM uploads WHERE id='$sid'");
while($pho= mysql_fetch_array($sqlo))
  {
$puc=$pho['url'];
}
}



$slider="#slider".$a;
echo('

<script type="text/javascript">
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
background:  rgb(246, 250, 199);
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

</style>


<a href="story?sid='.$sid.'"><div id="slider'.$a.'">
<div class="viewport">
<ul class="overview">
<li><img src="'.$pic2.$pic.'" style="max-height: 120px; max-width: 120px;"></li><li><b><u> You '.$type.':</u></b><br>');
echo($stext);
echo('</li>
<li><b>At:</b><br> '.$when.'</li>
<li><b>Likes:</b> '.$likes.'<br><b>Comments:</b> '.$comments.' </li>
</ul>
</div>
</div>
</a>
');
}
$no=mysql_num_rows($sql);
if($no==0){
echo('Boo! You dont have any posts yet!
<br>
<br><br>
You should try clicking the Post button...the one that looks like a pencil...and...ENJOY!!!');
}
echo('</div>');
}
?>