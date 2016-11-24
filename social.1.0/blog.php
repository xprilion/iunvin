<?php include('header.php'); ?>
<div id="wall" onclick="document.getElementById('menu').style.display='none';">

<div id="feed">
<?php
include('bloglist.php');
?>
</div>

<div id="content">

<div id="not">
<?php

include('up.php');

?>
<div id="shot"  style="margin-top: 30px;">
</div>
</div>
</div>

<div id="holder">
<div id="root"><img src="icons/menu.png" id="menuico"> </div>

<div id="menux">
<hr>
	<div id="root2"><img id="sideico" src="icons/post.png"></div>
	<a href="home.php"><div id="button"><img id="sideico" src="icons/home.png"></div> </a>
	<a href="dashboard.php"><div id="button"> <img id="sideico" src="icons/dashboard.png"> </div> </a>
	<a href="friends.php"><div id="button"> <img id="sideico" src="icons/friends.png"> </div> </a>
	<a href="photos.php"><div id="button"> <img id="sideico" src="icons/photos.png"> </div> </a>
<hr>
</div>

</div>

<div id="menu2">
<?php

include('post.php');

?>

</div>

</div>


<div id="footer">

</div>


</body>
</html>