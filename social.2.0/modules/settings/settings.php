<?php 
include('parser.php'); 
track('on self photos');
comm('check');
pk();
?>
<!DOCTYPE html>
<html>
<head>
<title>Settings</title>
<?php comm('theme'); ?>
<link rel="icon" href="img/small.png" type="image/x-icon">
<link rel="shortcut icon" href="img/small.png" type="image/x-icon" />
<link rel="stylesheet" href="base.css">
<script src="js/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
<script src="js/scripts.js"  charset="utf-8"></script>
<link href="assets/css/style.css" rel="stylesheet" />
<script src="assets/js/jquery.knob.js"></script>
<script src="assets/js/jquery.ui.widget.js"></script>
<script src="assets/js/jquery.iframe-transport.js"></script>
<script src="assets/js/jquery.fileupload.js"></script>
<script src="assets/js/script.js"></script>
<link href="themes/jquery.cssemoticons.css" media="screen" rel="stylesheet" type="text/css" />
<script src="js/jquery.cssemoticons.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function(){
$('#contenta').niceScroll();
$('#storyExt').niceScroll();
});
</script>
</head>
<body>
<div id="wrapper">
	<div id="midS"><img id="midSimg" src="loading.gif" height="30px" width="30px"></div>
	<div id="bTop" class="appTop">
		<div id="bLogo">iunv</div>
		<div id="bMenuRoot" class="menuinactive" onclick="mainMenu()" title="Menu"></div>
		<div id="bTitle"> Settings </div>
		<div id="bUser" class="right" onclick="bUserMenu()"><?php echo $_COOKIE['iunv_uname']; ?> </div>
		<?php include('modules/notifications/mini.php'); ?>
		<?php include('modules/friends/mini.php'); ?>
	</div>
	<div id="mainMenu">
<?php sidebar(); ?>
	</div>
	<div id="dashboard">
	<div id="contenta">
		<div class="appTop inPage">Display - Site customization</div>
<?php include('modules/settings/basic.php'); ?>
	</div>
	<div id="storyExt">
		<div class="appTop inPage">Privacy - What you share</div>
<?php include('modules/settings/advanced.php'); ?>
	</div>
	</div>
	<div id="bUserMenu">
		<li> Settings </li>
		<a href="logout"><li> Logout </li></a>
	</div>
</div>
<div id="viewer"><div id="vTitle" class="appTop inPage"><div onclick="killphotoview()" title="close" class="right inPageClose">&#10006;</div></div><div id="vMain"></div></div>
<div id="wrapLoad"><img src="loading.gif" height="100px" width="100px"></div>
</body>
</html>