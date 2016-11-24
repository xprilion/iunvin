<?php

function process($uree){
include('indexing.php');
indexing($uree);
}

function update($uree){
include('config.php');
$sql2 = mysql_query("SELECT * FROM pages WHERE url='$uree'");
while($site= mysql_fetch_array($sql2))
  {
$sid=$site['id'];
$sql = "UPDATE timer SET status='2' WHERE id='$sid'";
mysql_query($sql,$con);

}

}
?>