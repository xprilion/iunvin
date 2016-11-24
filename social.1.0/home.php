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
<!DOCTYPE html>
<html>
<head>
<title> Home - iunv.social </title>');
include('header.php');
echo('<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
$("#carousel").niceScroll();
$("#notifs").niceScroll();
});
</script>
<div id="wall"');
echo("('menu').style.display='none';document.getElementById('resulta').style.display='none';");
echo('">
<div id="feed" style="width: 87.5%;" >');
include('friendsfeed.php');
echo('</div>

');
echo('<div id="footer">');
include('footer.php');
echo('</div>');
echo('</div>
<div id="holder">');
include('sidebar.php');

echo('</div>');

echo('</div></body>
</html>');
}
?>