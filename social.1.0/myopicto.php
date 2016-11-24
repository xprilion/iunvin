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
<head><title> Myopicto&reg; - iunv.social </title>
<style>

#myo{
height: 20px;
width: auto;
display: inline-block;
padding: 5px;
border: 1px solid #0c0;
background: #12ff99;
position: fixed;
top: 100px;
right: 150px;
-webkit-transition: background 0.7s;
}
#myo:hover{
-webkit-transition: background 0.7s;
background: #12ee99;
}
body{
overflow: hidden;
}
</style>');
include('header.php');
echo('<div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';document.getElementById('resulta').style.display='none';");
echo('">');

function edit(){
$file=$_GET['file'];
echo('<a href="myopicto" id="myo"> Upload a new Myopicto&reg; </a>');
echo('<iframe src="pico?file='.$file.'" scrolling=no height=550px width=650px frameborder=0></iframe>');
}


function intro(){
include('myoup.php');
}


if(!isset($_GET['file'])){
intro();
}
else{
edit();
}

echo('</div>
<div id="holder" style="top: 100px;">');
include('sidebar.php');
echo('
</div>
</div>
<div id="footei">');
include('footer.php');
echo('</div>
</body>
</html>');
}

?>