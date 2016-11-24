<!DOCTYPE html>
<html>
<head> <title> Message - iunv.social </title>
<link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/messages.css">
<link rel="stylesheet" href="css/dash.css">
<link rel="stylesheet" href="css/sidebar.css">


</head><body style="color: #000;"><div id="header"> <a href="./"><img src="logo.png"></a></div>
<div id="searchbar" onmouseover="document.getElementById('resulta').style.display='block';"> <?php include('searchbar.php'); ?> <span id="resulta"> </span></div>
<div id="foi"> <?php include('login.php'); include('js/sidebar.js'); ?> </div>
</div>
<div id="wall" onclick="document.getElementById('menu').style.display='none';">
<div id="mframe">








</div>
</div>


<div id="holder" style="top: 100px;">
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
&copy; iunv 2013<a href="feedback.php"><div id="feedback"> Feedback </div></a>
</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script> 
<script src="js/jquery.nicescroll.min.js"></script> 

<script> 
 $(document).ready(function() {    
$("#notifs").niceScroll();
$("#mframe").niceScroll();
  });

</script>



</body>
</html>
<div style="position: fixed; top: 5px; right: 300px; "> <?php include('mini_notifs.php'); ?></div>
<div style="position: fixed; top: 10px; right: 370px; "> <?php include('msgs.php'); ?></div>


