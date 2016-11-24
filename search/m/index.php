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
<script language="javascript" src="scripts.js"></script>

</head>
<body>
<table>
<tr>
<div id="topy">
<a href="http://iunv.in/find/m/"><div id="homeb"><font size="6">iunv.find</font></div></a>
<?php
include('topy.php');
?>
</div>
</tr><tr>
<div id="ifcontainer">
<form action="" method="get">
<input type="text" name="s" id="ifbar"<?php
if(isset($_GET['s'])){
$s=$_GET['s'];
echo('value="'.$s.'"');
}
?> >
<input id="ifbut" type="submit" value="Search" />
</form>
</div>
</tr><tr>
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
</tr></table>
</body>
</html>
