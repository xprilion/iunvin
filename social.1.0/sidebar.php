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
echo('<div id="root"><img src="icon/menu.png" id="menuico"> </div>
<div id="menux">
<hr>
	<div id="root2"><img id="sideico" src="icon/post.png"></div>
	<a href="home"><div id="button"><img id="sideico" src="icon/home.png"></div> </a>
	<a href="dashboard"><div id="button"> <img id="sideico" src="icon/dashboard.png"> </div> </a>
	<a href="friends"><div id="button"> <img id="sideico" src="icon/friends.png"> </div> </a>
	<a href="photos"><div id="button"> <img id="sideico" src="icon/photos.png"> </div> </a>
<hr>
</div>
</div>
<div id="menu2">');
include('post.php');
echo('</div>');
}
?>
