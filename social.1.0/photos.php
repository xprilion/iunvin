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
<title> Photos - iunv.social </title>');

include('header.php');
echo('<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
$("#carousel").niceScroll();
$("#notifs").niceScroll();
});
</script>
<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';document.getElementById('resulta').style.display='none';");
echo('">
<div id="feed">');
include('photolist.php');
echo('</div>
<div id="content">
<div id="not">');
include('up.php');
echo('</div>
<div id="shot"  style="margin-top: 30px;background:transparent;">
<div align="center">
<script type="text/javascript">
ch_client = "asanuj";
ch_width = 468;
ch_height = 250;
ch_type = "mpu";
ch_sid = "photos";
ch_color_site_link = "0000CC";
ch_color_title = "0000CC";
ch_color_border = "ADADAD";
ch_color_text = "000000";
ch_color_bg = "F5F5F5";
</script>
<script src="http://scripts.chitika.net/eminimalls/amm.js" type="text/javascript">
</script>
</div>
</div>
</div>
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