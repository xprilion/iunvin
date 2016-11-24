<?php
include('header.php');
?>
<script language="javascript" src="scripts.js"></script>
<?php
if(!isset($_GET['s'])){
echo('<title> Images - iunv.find </title>');
}
else{
echo('<title> '.$_GET["s"].' - images@iunv.find </title>');
}
?>
</head>
<body>
<table><tr>
<div id="topy"><?php
include('topy.php');
?></div>


</tr><tr>
<div id="ifcontainer">
<form action="" method="get" name="search">
<input type="text" name="s" id="ifbar"<?php
if(isset($_GET['s'])){
$s=$_GET['s'];
echo('value="'.$s.'"');
}
?>
/>
<input id="ifbut" type="submit" value="Search" /></form>
</tr><tr>
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
</tr></table>
<div id="prev">
<div id="closi" onclick="closi()">X</div>
<div id="previ">
</body>
