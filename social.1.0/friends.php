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
<head>
<title> Friends - iunv.social </title>');
include('header.php');
echo('<script type="text/javascript">
$(document).ready(function(){
$("#carousel").niceScroll();
$("#notifs").niceScroll();
$("#content").niceScroll();
});
</script>
<script>
function cono(){
document.getElementById("findd").style.opacity="0.3";
}

function gono(){
document.getElementById("findd").style.opacity="1";
}

</script>

<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';document.getElementById('resulta').style.display='none';");
echo('">
<div id="feed">');
include('friendlist.php');
echo('</div>


<div id="content"><a href="find-friends"><div id="finddem" onmouseover="cono()" onmouseout="gono()">Find your friends now!</div></a><div id="findd">');
include('suggestions.php');
echo('</div></div>
<div id="holder">');
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
