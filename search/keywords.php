<?php
// Fill up array with names
$q=$_GET["s"];
include('config.php');
$a=array();
$find = mysql_query("SELECT * FROM keywords WHERE keyword LIKE '%$q%' LIMIT 10");
while($bo=mysql_fetch_assoc($find)){
$keyword=$bo['keyword'];
echo('<li onclick=putit("'.$keyword.'");>'.$keyword.'</li>');
}
?>