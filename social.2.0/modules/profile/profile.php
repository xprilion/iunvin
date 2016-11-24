<?php
include('config.php');
include('othparser.php');
$q=mysql_query("SELECT * FROM account WHERE username='$pname'");
if(mysql_num_rows($q)>0){
track("viewing ".$pname." profile");
}
else{
echo('<script>window.location.replace("./#profileMissing");</script>');
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php comm('name', $pname); ?></title>
<link rel="icon" href="img/small.png" type="image/x-icon">
<link rel="shortcut icon" href="img/small.png" type="image/x-icon" />
<?php comm('theme', $pname); ?>
<link rel="stylesheet" href="base.css">
<link href="assets/css/style.css" rel="stylesheet" />
<script src="js/jquery.min.js" charset="utf-8"></script>
<script src="assets/js/jquery.knob.js"></script>
<script src="assets/js/jquery.ui.widget.js"></script>
<script src="assets/js/jquery.iframe-transport.js"></script>
<script src="assets/js/jquery.fileupload.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/pro-script.js"></script>
<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
<script src="js/scripts.js"  charset="utf-8"></script>
<script src="js/jquery.lazyload.js" charset="utf-8"></script>
<link href="themes/jquery.cssemoticons.css" media="screen" rel="stylesheet" type="text/css" />
<script src="js/jquery.cssemoticons.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function(){
$("img.lazy").lazyload({
effect : "fadeIn"
});
});
</script>
<?php
echo('<script type="text/javascript">
$(function(){
getLocal("'.$pname.'");
});
</script>
');
?>


</head>
<body>
<div id="wrapper">
	<div id="midS"><img id="midSimg" src="loading.gif" height="30px" width="30px"></div>
	<div id="bTop" class="appTop">
		<div id="bLogo">iunv</div>
		<div id="bMenuRoot" class="menuinactive" onclick="mainMenu()" title="Menu"></div>
		<div id="bTitle"><?php comm('name', $pname); ?></div>
		<div id="bUser" class="right" onclick="bUserMenu()"><?php echo $_COOKIE['iunv_uname']; ?></div>
		<?php include('modules/notifications/mini.php'); ?>
		<?php include('modules/friends/mini.php'); ?>
	</div>
	<div id="mainMenu">
<?php sidebar(); ?>
	</div>
         <div id="profile">
	<div id="contenta">
<?php comm('writeStory', $pname); ?>
			<div id="streamTop"></div>
			<div id="streamMain"><center><img src="loading.gif"></center></div>
	</div>
	<div id="proSets" style="display: none;">
	</div>
	<div id="storyExt">
<?php comm('profile', $pname); ?>
	</div>
           </div>
	<div id="bUserMenu">
		<li> Settings </li>
		<a href="logout"><li> Logout </li></a>
	</div>
</div>
<div id="wrapLoad"><img src="loading.gif" height="100px" width="100px"></div>
<div id="viewer"><div id="vTitle" class="appTop inPage"><div onclick="killphotoview()" title="close" class="right inPageClose">&#10006;</div></div><div id="vMain"></div></div>
</body>
</html>