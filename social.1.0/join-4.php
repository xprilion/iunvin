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
<title> Join Us - iunv.social </title>');
include('header.php');
echo('<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';");
echo('">

<div id="jframe">
Almost there!<hr><br>
<form action="join-5" method="post" autocomplete="off">
Profession: <select name="profession" class="abs" style="width: 200px;"> 

	<option value="Businessman"> Businessperson </option>
	<option value="Employee"> Employee </option>
	<option value="Employer"> Employer </option>
	<option value="Student"> Student </option>
	<option value="Teacher"> Teacher </option>
	<option value="craftsman"> Craftsperson </option>
	<option value="Artist"> Artist </option>	
</select> <br><br>
Likes: <textarea name="likes" type="text"  id="likes" class="texti"/> </textarea><br><br><br><br>
Dislikes: <textarea name="dislikes" type="text"  id="dislikes" class="texti"/> </textarea> <br><br><br><br>
Something only you have or can: <textarea name="onlyme" type="text"  id="onlyme" class="texti"/> </textarea><br><br><br><br>
Suggestions for this site: <textarea name="suggestions" type="text"  id="suggest" class="texti"/> </textarea><br><br>


<input type="submit" id="go" value="Complete!" class="sub"/>
</form>
</div>
</div>
<div id="footer">');
include('footer.php');
echo('</div>
</body>
</html>');
}
?>