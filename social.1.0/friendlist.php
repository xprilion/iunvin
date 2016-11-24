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
$time=time();
$sql = mysql_query("SELECT * FROM friends WHERE uid='$uid' AND status=2");
if(mysql_num_rows($sql)==0){
echo("Oops! Looks like you don't have any friends! Try hunting them down in the list given! ;) ");

}

else
{
$a=0;
while($frnd= mysql_fetch_array($sql))
  {
$frndid=$frnd['fid'];
$since2=$frnd['time'];
$since=date("D F d Y",$since2);
$sql2 = mysql_query("SELECT * FROM account WHERE id='$frndid'");

while($frnds= mysql_fetch_array($sql2))
  {
++$a;
$slider="#slider".$a;
$friend=$frnds['fullname'];
$funame=$frnds['username'];
$fupic=$frnds['avatar'];

if(strlen($fupic)<3){
$fupic="icon/defaultpic.png";
$fupic2="";
}
else{
$fupic2='uploads/images/'.$funame.'/thumbnails/';
}
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
echo('
<a href="profile?p='.$funame.'"><div id="slider'.$a.'">
<div class="viewport">
<ul class="overview">
<li><img src="'.$fupic2.$fupic.'" style="max-height: 100px; max-width: 100px;"><br>'.$friend.'</li>
<li>Friends since:<br>'.$since.'</li>									
</ul>
</div>
</div></a>');
}
}
}
echo('</div>');
}
?>

