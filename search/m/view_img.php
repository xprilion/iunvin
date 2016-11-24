<?php include('config.php');
$id=$_GET['img'];
$images = mysql_query("SELECT * FROM images WHERE id = '$id'");
while($im=mysql_fetch_assoc($images)){
$img=$im['url'];
$site=$im['site'];
$folder=$im['folder'];
$page=$im['fullp'];
$img=$site.$folder.'/'.$img;
echo('<img src="http://'.$img.'">');
echo('<div id="prevt">');
echo('<a href="http://'.$img.'" class="fullsize">See full size</a>');
echo('<a href="http://'.$page.'" class="gotopage">Go to page</a>');
echo('<div id="idim"></div>');
}
?>


