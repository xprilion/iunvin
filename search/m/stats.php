<?php

include('config.php');

$sites= mysql_query("SELECT * FROM sites");
$nums=mysql_num_rows($sites);
echo('Sites crawled: <b>'.$nums.'</b><br>');

$pages= mysql_query("SELECT * FROM pages");
$nump=mysql_num_rows($pages);
echo('Pages crawled: <b>'.$nump.'</b><br>');

$keywords= mysql_query("SELECT * FROM keywords");
$numk=mysql_num_rows($keywords);
echo('Keywords indexed: <b>'.$numk.'</b><br>');

$images= mysql_query("SELECT * FROM images");
$numi=mysql_num_rows($images);
echo('Images indexed: <b>'.$numi.'</b><br>');

$links= mysql_query("SELECT * FROM links");
$numl=mysql_num_rows($links);
echo('Links indexed: <b>'.$numl.'</b><br>');

?>
