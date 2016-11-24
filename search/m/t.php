<?php
if(!isset($_GET['url'])){
echo('No URL Specified!');
}
else{
if(strlen(trim($_GET['url']))<3){
echo('That happens to be too short a URL!');
}
else{
$term=$_GET['s'];
$url=$_GET['url'];
$urlx=parse_url($url, PHP_URL_HOST);
$urlx = preg_replace("(https?://)", "", $urlx);
include('config.php');

$sql = mysql_query("SELECT * FROM pages WHERE url = '$urlx'");
if(mysql_num_rows($sql)){
while($ki= mysql_fetch_array($sql))
  {
$times=$ki['viewed'];
$times=$times+1;
mysql_query("UPDATE pages SET viewed = '$times' WHERE url = '$urlx'");
}
}
$ur=$url;
echo('<meta http-equiv="refresh" content="0;'.$ur.'">');
}
}

?>


