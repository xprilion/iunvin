<?php
include('header.php');
 ?>

<script language="javascript" src="liveclock2.js"></script>
<script language="javascript" src="scripts.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$("body").niceScroll();
$("#prev").niceScroll();
});
</script>
<?php
if(!isset($_GET['s'])){
echo('<title> Images - iunv.find </title>');
}
else{
echo('<title> '.$_GET["s"].' - images@iunv.find </title>');
}
?>
</head>

<body onload="show_clock();">
<div id="topy"> <font size="7"><div id="hlogo"><a href="/">iunv</a><a href="/find">.find</a></div></font> <div id="clock"></div></div>


<div id="ifcontainer" class="effect6">
<form action="" method="get" autocomplete="off" name="search">
<input type="text" name="s" id="ifbar" onkeyup="hint(this.value)" <?php

if(isset($_GET['s'])){
$s=$_GET['s'];
echo('value="'.$s.'"');
}
?>
autofocus />
<input type="submit" style="display: none;" /><div id="abcdef" style="display: inline;">
<div id="ifbut" onclick="imsearchit()"><center><img src="search.ico" align="center"></center></div>
</div></form>
<div id="hints"> </div>
</div>

<div id="content">
<?php
if(!isset($_GET['s'])){
include('base.php');
}
else{
include('img_search.php');
}

include('footer.php');

?>
</div>

<div id="lefty" class="effect2">
<?php include('sidebar.php'); ?>
</div>

</div>
</div>
</body>
