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
echo('<!DOCTYPE html>
<html>
<head>');
include('header.php');
echo('<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
$("#sayings").niceScroll();
$("#notifs").niceScroll();
});
</script><div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';document.getElementById('resulta').style.display='none';");
echo('">
<div id="story">');
if(!isset($_GET['sid'])){
HEADER('Location: dashboard');
}
else{
$sid=$_GET['sid'];
$uname=$_COOKIE['iunv_uname'];
include('config.php');
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");
while($streams= mysql_fetch_array($sql))
  {
$stext=$streams['text'];
$sname=$streams['name'];
echo('<title>'.$sname.'</title>');
$suname=$streams['username'];
$typex=$streams['type'];
$views=$streams['views'];
switch($typex){
case 1: $type='said';break;
case 2: $type='likes'; break;
case 3: $type='comments'; break;
case 4: $type='uploaded a pic!'; break;
case 5: $type='updated profile pic'; break;
case 9: $type='updated Myopicto'; break;
}

if(($typex==5) || ($typex==4)){

$sqlx = mysql_query("SELECT * FROM uploads WHERE sid='$sid'");
$picx= mysql_fetch_assoc($sqlx);
$caption2=$picx['caption'];
$caption='<br>'.$caption2.'<br>';

}

else{

$caption=" ";

}

echo('<a href="profile?p='.$suname.'">'.$sname.'</a> '.$type.': ');
if($suname!==$uname){

echo('<font size="5"><a href="report?sid='.$sid.'"> <div id="report"> ! </div>
 </a> </font>');

}

else{

echo('<font size="5"><a href="delete?sid='.$sid.'"> <div id="del"> X </div>
 </a> </font>');


}


echo('<br> '.$caption.'<br>');
echo($stext);
echo('<br><hr>');
include('view.php');
echo('</div>');
echo('

<div id="commentary">');
include('rep.php');
++$views;
$ss="UPDATE streams SET views='$views' WHERE id='$sid'";

if(!mysql_query($ss,$con)){
echo('Error!');
}

}
}
echo('
<div id="storyad">
<script type="text/javascript">
ch_client = "asanuj";
ch_width = 300;
ch_height = 150;
ch_type = "mpu";
ch_sid = "story";
ch_color_site_link = "0000CC";
ch_color_title = "0000CC";
ch_color_border = "D6D6D6";
ch_color_text = "000000";
ch_color_bg = "F7F7F7";
</script>
<script src="http://scripts.chitika.net/eminimalls/amm.js" type="text/javascript">
</script>
</div>
</div>
</div>
<div id="holder" style="top: 100px;">');
include('sidebar.php');
echo('</div>
</div>
<div id="footer">');
include('footer.php');
echo('</div></body>
</html>');
}
?>