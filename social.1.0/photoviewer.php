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
$sid=$_GET['sid'];
$uname=$_COOKIE['iunv_uname'];
$sql = mysql_query("SELECT * FROM uploads WHERE sid='$sid'");
while($pic= mysql_fetch_array($sql)){
$image=$pic['url'];
$path='uploads/images/'.$uname.'/'.$image;
$caption=$pic['caption'];
echo('<div id="viewit">');
echo('<img style="max-width:400px; max-height:400px; " src="'.$path.'"><br>');
echo('<div id="caption">');
echo($caption);
echo('</div>');
echo('</div>');
$holder="What's up with this photo?";
echo('<div id="phototools">');
echo('<form name="goko" method="post" action="" style="display: inline-block;">
<input type="text" name="kapti" id="op" placeholder="'.$holder.'" autofocus="true" />
</form>
<div onclick="wonko();" id="repl"> Captionate! </div>
<a href="delete?sid='.$sid.'" id="repl"> Delete </a>
');
echo('<div id="sisi" style="display: none;">'.$sid.'</div>');
echo('</div>');
}
}

?>