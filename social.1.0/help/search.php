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
$("#story").niceScroll();
$("#notifs").niceScroll();
});
</script>
<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';document.getElementById('resulta').style.display='none';");
echo('">
<br>
<div id="story">');
include('config.php');
$keyword=$_GET['s'];
echo('<title>'.$keyword.' - iunv.find.social </title>');
$sql2 = "SELECT * FROM keywords WHERE keyword='$keyword'";
    $result = mysql_query($sql2) or die('error');
    $row = mysql_fetch_assoc($result);
    if(mysql_num_rows($result)) {
$sqlt = mysql_query("SELECT * FROM key_$keyword ORDER BY `key_$keyword`.`times` DESC ");
while($res= mysql_fetch_array($sqlt))
  {
$sid=$res['sid'];
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");
while($streams= mysql_fetch_array($sql))
  {
$stext=$streams['text'];
$sname=$streams['name'];
$suname=$streams['username'];
$typex=$streams['type'];
$views=$streams['views'];
switch($typex){
case 1: $type='said';break;
case 2: $type='likes'; break;
case 3: $type='comments'; break;
case 4: $type='uploaded a pic!'; break;
case 5: $type='updated profile pic'; break;
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

echo('<a href="story.php?sid='.$sid.'"><a href="profile.php?p='.$suname.'">'.$sname.'</a> '.$type.':<br> '.$caption.'<br>');
echo($stext);
echo('</a><hr>');
}
}
}
echo('</div>
</div><div id="holder">');
include('sidebar.php');
echo('</div>
</div>
<div id="footer">');
include('footer.php');
echo('</div>
</body>
</html>');
}
?>