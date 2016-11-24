<?php 
include('parser.php'); 
comm('check');
track('signed up');
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up to iunv</title>
<?php comm('theme'); ?>
<link rel="stylesheet" href="base.css">
<script src="js/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
<script src="js/scripts.js"  charset="utf-8"></script>
<script src="js/jquery.lazyload.js" charset="utf-8"></script>
<script type="text/javascript" src="js/jsr_class.js"></script>

<script type="text/javascript">
var whos=null;
function getplaces(gid,src)
{	
	whos = src
//	var  request = "http://ws.geonames.org/childrenJSON?geonameId="+gid+"&callback=getLocation&style=long";
	var request = "http://www.geonames.org/childrenJSON?geonameId="+gid+"&callback=listPlaces&style=long";
	aObj = new JSONscriptRequest(request);
	aObj.buildScriptTag();
	aObj.addScriptTag();	
}
function listPlaces(jData)
{
	counts = jData.geonames.length<jData.totalResultsCount ? jData.geonames.length : jData.totalResultsCount
	who = document.getElementById(whos)
	who.options.length = 0;
	
	if(counts)who.options[who.options.length] = new Option('Select','')
	else who.options[who.options.length] = new Option('No Data Available','NULL')
			
	for(var i=0;i<counts;i++)
		who.options[who.options.length] = new Option(jData.geonames[i].name,jData.geonames[i].geonameId)

	delete jData;
	jData = null		
}
window.onload = function() { getplaces(6295630,'continent'); }
</script>
<script type="text/javascript" charset="utf-8">
$(function(){
$('#contenta').niceScroll();
$('#storyExt').niceScroll();
});
</script>
<body>
<div id="wrapper">
	<div id="bTop" class="appTop">
		<div id="bLogo">iunv</div>
		<div id="bTitle"> Sign Up </div>
		<div id="bUser" class="right" onclick="bUserMenu()"> <?php echo $_COOKIE['iunv_uname']; ?> </div>
	</div>
	<div id="contenta">
<?php comm('join'); ?>
	</div>
	<div id="storyExt">
		hi
	</div>
	<div id="bUserMenu">
		<li> Come back later </li>
	</div>
</div>
</body>
</html>