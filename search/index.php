<?php
include('header.php');
 ?>
<?php
if(!isset($_GET['s'])){
echo('<title> Find - iunv </title>');
}
else{
echo('<title> '.$_GET["s"].' - iunv.find </title>');
}
?>
<script language="javascript" src="liveclock2.js"></script>
<script language="javascript" src="scripts.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$("body").niceScroll();
$("#prev").niceScroll();
});
</script>

</head>
<body onload="show_clock();">
<img src="loading.gif" style="display: none;">
<img src="search.ico" style="display: none;">
<div id="topy"><font size="7"><div id="hlogo"><a href="/">iunv</a><a href="/find">.find</a></div></font>
<div id="clock"></div></div>
<div id="ifcontainer" class="effect6">
<form action="" method="get" autocomplete="off" name="search">
<input type="text" name="s" placeholder="Type in a query to search..." id="ifbar" onkeyup="hint(this.value)"<?php
if(isset($_GET['s'])){
$s=$_GET['s'];
echo('value="'.$s.'"');
}
?>
autofocus >
<input type="submit" style="display: none;" id="gum" /><div id="abcdef" style="display: inline;">
<div id="ifbut" onclick="searchit()"><center><img src="search.ico" align="center"></center></div>
</div></form>
<div id="hints"> </div>
</div>
<div id="content">

<?php

if(!isset($_GET['s'])){
include('base.php');
}
else{
include('search.php');
}
include('footer.php');
?>
</div>

<div id="lefty" class="effect2">
<?php include('sidebar.php'); ?>
</div>
<div style="margin-top: 20px;">
<script type="text/javascript">
// Ad Type Square(250x250)
var pubid = "pub-1665187101";
var adwidth = "250px";
var adheight = "250px";
var adbagclr = "FFFFFF";
var adborclr = "FFFFFF";
var adtitclr = "0000FF";
var adtxtclr = "000000";
var adurlclr = "008000";
</script>
<script type="text/javascript" src="https://www.atozinfotech.com/ppcpublisher/network/adserver1/show_ad.js"></script>
<script type="text/javascript" src="https://www.atozinfotech.com/ppcpublisher/network/adserver/showad.js">
</script>

</div>
<div id="prev">
<div id="closi" onclick="closi()">X</div>
<div id="previ">
</body>
