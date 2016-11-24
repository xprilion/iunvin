<!DOCTYPE html>
<html>
<head>
<title>Story</title>
<?php 
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
$them=mysql_query("SELECT * FROM user_settings WHERE uid='$uid'");
$theme="iunv.css";
if(mysql_num_rows($them)>0){
$the=mysql_fetch_assoc($them);
$background=$the['background'];
$theme=$the['theme'];
}
else{
$background='default';
$theme='iunv.css';
}
if($background=='default'){
$bg="img/bcubes.jpg";
}
else{
$bg="uploads/backgrounds/".$uid."/".$background;
}
setcookie("iunv_bg", $background);
setcookie("iunv_th", $theme);
echo('<style>');
echo("
#wrapper{background: url('".$bg."');}");
include('../../themes/'.$theme);
echo('</style>'); ?>
<link rel="icon" href="img/small.png" type="image/x-icon">
<link rel="shortcut icon" href="img/small.png" type="image/x-icon" />
<link rel="stylesheet" href="base.css">
<script src="js/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
<link href="themes/jquery.cssemoticons.css" media="screen" rel="stylesheet" type="text/css" />
<script src="js/jquery.cssemoticons.min.js" type="text/javascript"></script>
<script src="js/scripts.js"  charset="utf-8"></script>
</head>
<body>
<div id="wrapper">
	<div id="midS"><img id="midSimg" src="loading.gif" height="30px" width="30px"></div>
	<div id="bTop" class="appTop">
		<div id="bLogo">iunv</div>
		<div id="bMenuRoot" class="menuinactive" onclick="mainMenu()" title="Menu"></div>
		<div id="bTitle"> Story </div>
		<div id="bUser" class="right" onclick="bUserMenu()"><?php echo $_COOKIE['iunv_uname']; ?> </div>
		<?php include('../notifications/mini2.php'); ?>
		<?php include('../friends/mini2.php'); ?>
	</div>
	<div id="mainMenu">
		<a href="dashboard"><li class="mainli" onclick=navto("dashboard")>Dashboard</li></a>
		<a href="profile"><li  class="mainli" onclick=navto("profile")>Profile</li></a>
		<a href="friends"><li  class="mainli" onclick=navto("friends")>Friends</li></a>
		<a href="photos"><li  class="mainli" onclick=navto("photos")>Photos </li></a>
		<a href="settings"><li  class="mainli" onclick=navto("settings")> Settings </li></a>
		<div id="wChatCss"></div>
		<div id="wChatJs"></div>
		<div id="wChatMain"></div>
	</div>
	<div id="dashboard">
	<div id="contenta">
<?php
$sid=$_GET['refid'];
include('story.php');
story($sid);
?>
	</div>
	<div id="storyExt">
Your friends are those who make you.
	</div>
	</div>
	<div id="bUserMenu">
		<li> Settings </li>
		<a href="logout"><li> Logout </li></a>
	</div>
</div>
<div id="wrapLoad"><img src="loading.gif" height="100px" width="100px"></div>
</body>
</html>