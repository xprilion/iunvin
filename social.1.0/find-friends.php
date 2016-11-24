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
<style>
.textii{
padding: 0.5em;
border: 1px solid #cdcdcd;
outline: none;
width: 100%;
}

.textii:focus{
border: 1px solid #1277ff;
}
</style>
<title> Friends - iunv.social </title>');
include('header.php');
echo('<script type="text/javascript">
$(document).ready(function(){
$("#carousel").niceScroll();
$("#notifs").niceScroll();
$("#content").niceScroll();
});
</script>
<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';document.getElementById('resulta').style.display='none';");
echo('">
<div id="feed"> 
<form name="xoxo" action=" " method="get" style="padding: 1em; background: #12ddff; border-radius: 5px; border: 7px solid #12aaff; margin-left: 10px; box-shadow: 0px 0px 20px 0px #12aacc inset;">
Filter according to: <br><hr><br>
Name: <input type="text" name="name" class="textii" style="width: 165px; float: right;" /><br><br>
Country: <input type="text" name="country" class="textii" style="width: 165px; float: right;" /><br><br><br>
Age: <select name="age" style=" width: 180px; float: right;" >
	<option value=""> Select </option>
	<option value="1996"> 1996 </option>
</select><br><br>
Sex: <select name="sex" style="width: 180px; float: right;" >
	<option value=""> Select </option>
	<option value="1"> Male </option>
</select><br><br>
<input type="hidden" name="filter" value="1" />
<input type="submit" id="go" value="Filter"></input></form>
<hr>
<script type="text/javascript">
ch_client = "asanuj";
ch_width = 300;
ch_height = 150;
ch_type = "mpu";
ch_sid = "find friends";
ch_color_site_link = "0000CC";
ch_color_title = "0000CC";
ch_color_border = "ADADAD";
ch_color_text = "000000";
ch_color_bg = "F5F5F5";
</script>
<script src="http://scripts.chitika.net/eminimalls/amm.js" type="text/javascript">
</script>
</div>
<div id="content">');
include('browse.php');
echo('</div>
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
