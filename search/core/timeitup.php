<?php

$act=$_GET['act'];
if(isset($_GET['url'])){
$url=$_GET['url'];
}
else
{
$url="http://iunv.in";
}

if(isset($_GET['id'])){
$id=$_GET['id'];
}
else
{
$id="1";
}
switch($act){
case 1: addurl($url); break;
case 2: dourl($id); break;
case 3: undourl($id); break;
}

function addurl($url){
include('config.php');

$sql2 = "SELECT * FROM timer WHERE url = '$url'";
$result = mysql_query($sql2) or die('error');

if(mysql_num_rows($result)) {   
echo('Exists!');
}

else{
mysql_query("INSERT INTO timer(url) VALUES ('$url')");
echo('<div id="notif">Added!</div>');
}
listem();

}


function dourl($id){
include('config.php');
mysql_query("UPDATE timer SET status = '2' WHERE id='$id'");

echo('<div id="notif">The Job was Done!</div>');
listem();
}

function undourl($id){
include('config.php');
$undo=$id;

mysql_query("UPDATE timer SET status = '0' WHERE id='$undo'");

echo('<div id="notif">
The Job was UnDone!</div>
');
listem();
}


function listem(){
include('config.php');
$sql2 = mysql_query("SELECT * FROM timer WHERE status='0' LIMIT 25");

while($timer = mysql_fetch_array($sql2))
  {
$id=$timer['id'];
$url=$timer['url'];
echo(''.$id.'&nbsp; &nbsp; &nbsp;'.$url);echo('&nbsp; &nbsp; &nbsp; &nbsp;');
echo('<button onclick=doit("'.$id.'");> DO it. </button>');
echo('<br>');
}


echo('<br><hr><br>Done...<br>');

$sql2 = mysql_query("SELECT * FROM timer WHERE status='2' LIMIT 25");

while($client = mysql_fetch_array($sql2))
  {
$id=$client['id'];
$url=$client['url'];
echo($id.'&nbsp; &nbsp; &nbsp;'.$url);echo('&nbsp; &nbsp; &nbsp; &nbsp;');
echo('<button onclick=undoit("'.$id.'");> Undo it. </button>');
echo('<br>');
}
}
?>