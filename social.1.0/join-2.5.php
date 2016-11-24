<?php
include('config.php');
echo('<!DOCTYPE html>
<html>
<head>
<title> Join Us - iunv.social </title>');
include('header.php');
echo('<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';");
echo('">
<div id="jframe">
<form action="join-3" method="post" autocomplete="off">
Full Name: <input name="fullname" type="text" id="fullname" class="texti"/> <br><br>
Gender: <select name="gender" class="abs"> <option value="1"> Male </option><option value="2"> Female </option> <option value="3"> Other </option></select><br><br>
DOB: <select name="month" class="abs"/>');
$a=0;
while($a<12){
++$a;
echo('<option value="'.$a.'" id="opt"> '.$a.' </option>');
}
echo('</select>
<select name="date" class="rela"/>');
$a=0;
while($a<31){
++$a;
echo('<option value="'.$a.'"> '.$a.' </option>');
}
echo('</select>
<select name="year" class="rela2" />');
$a=1950;
while($a<2010){
++$a;
echo('<option value="'.$a.'"> '.$a.' </option>');
}
echo('</select><br><br>
Country: <input name="country" type="text"  class="texti"/> <br><br>
Introduction: <textarea name="intro" type="text"  id="intro" class="texti"/> </textarea><br><br><br><br><br><br><br>
About Me: <textarea name="about" type="text"  id="about" class="texti"/> </textarea> <br><br>
<input type="submit" id="go" value="Next" class="sub"/>
</form>
</div>
</div>
<div id="footer">');
include('footer.php');
echo('</div>
</body>
</html>');

?>
