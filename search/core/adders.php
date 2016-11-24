<?php

function keywordadd($key, $url){
$key2=trim($key);
$key = htmlspecialchars($key, ENT_QUOTES);
if(strlen($key2)>0){
include('config.php');
$time=time();

$sql2 = mysql_query("SELECT * FROM keywords WHERE keyword = '$key'");
if(mysql_num_rows($sql2)){
while($ki= mysql_fetch_array($sql2))
  {
$times=$ki['times'];
$times=$times+1;
mysql_query("UPDATE keywords SET times = '$times' WHERE keyword = '$key'");

$pos=strrpos($url, '/');
if(substr($url, -1, $pos) == '/'){
$page=" ";
}
else{
$page=basename($url);
}

$fullp=$url;

$site=parse_url($url, PHP_URL_HOST);
$site = preg_replace("(https?://)", "", $site );

$sqlb = mysql_query("SELECT * FROM xxx_$key WHERE fullp = '$fullp'");
if(!mysql_num_rows($sqlb)){
$sql="INSERT INTO xxx_$key(page, site, time, fullp) VALUES ('$page', '$site', '$time', '$fullp')";
mysql_query($sql,$con);
}

}
}
else{
$sql="INSERT INTO keywords(keyword, time) VALUES ('$key', '$time')";
mysql_query($sql,$con);

$create="CREATE TABLE  `xxx_$key` (
 `id` INT( 100 ) NOT NULL AUTO_INCREMENT ,
 `site` TEXT NOT NULL ,
 `page` TEXT NOT NULL ,
 `fullp` TEXT NOT NULL ,
 `clicks` INT( 100 ) NOT NULL ,
 `score` INT( 100 ) NOT NULL ,
 `time` INT( 100 ) NOT NULL ,
PRIMARY KEY (  `id` )
) ENGINE = INNODB DEFAULT CHARSET = latin1; ";
mysql_query($create,$con);


///////


$fullp=$url;

$pos=strrpos($url, '/');
if(substr($url, -1, $pos) == '/'){
$page=" ";
}
else{
$page=basename($url);
}

$site=parse_url($url, PHP_URL_HOST);
$site = preg_replace("(https?://)", "", $site );
$tags = get_meta_tags($page);
$line=$tags['description'];
$sql="INSERT INTO xxx_$key(page, site, time, fullp) VALUES ('$page', '$site', '$time', '$fullp')";
mysql_query($sql,$con);

}
}
}


function imageadd($image, $url){
include('config.php');
$time=time();
$urk = preg_replace("(https?://)", "", $url );
$sql2 = mysql_query("SELECT * FROM images WHERE url = '$image' AND fullp = '$urk'");
if(!mysql_num_rows($sql2)){
$uree=$url;
$pos=strrpos($url, '/');
if(substr($url, -1, $pos) == '/'){
$page=" ";
}
else{
$page=basename($url);
}


$url = preg_replace("(https?://)", "", $url );
$len=strlen($url);
$pos=strrpos($url, '/');
$str=substr($url, 0, $pos);
$posn=strpos($url, '/');
$strn=substr($str, $posn, $pos);
$folder=$strn;
$url="http://".$url;

$url=parse_url($url, PHP_URL_HOST);
$url = preg_replace("(https?://)", "", $url );
$sql="INSERT INTO images(url, time, page, site, folder, fullp) VALUES ('$image', '$time', '$page', '$url', '$folder', '$urk')";
mysql_query($sql,$con);
}
}


function linkadd($link, $url){
include('config.php');
$time=time();
$sql2 = mysql_query("SELECT * FROM links WHERE urlto = '$link' AND urlfrom = '$url'");
if(!mysql_num_rows($sql2)){
$sql="INSERT INTO links(urlfrom, urlto, time) VALUES ('$url', '$link', '$time')";
mysql_query($sql,$con);
$sql="INSERT INTO timer(url, time) VALUES ('$link', '$time')";
mysql_query($sql,$con);
}
}

function domainadd($url){
include('config.php');
$time=time();
$uree=$url;
$url=parse_url($url, PHP_URL_HOST);
$url = preg_replace("(https?://)", "", $url );
if(strlen($url)>4){
$sql2 = mysql_query("SELECT * FROM sites WHERE url = '$url'");
if(mysql_num_rows($sql2)>0){
while($ki= mysql_fetch_array($sql2))
  {
$times=$ki['inlinks'];
$times=$times+1;
mysql_query("UPDATE sites SET inlinks = '$times' WHERE url = '$url'");
pageadd($uree);
}
}
else{
$sql="INSERT INTO sites(url, time) VALUES ('$url', '$time')";
mysql_query($sql,$con);

pageadd($uree);
}
}
}

function pageadd($url){
include('config.php');
$time=time();
$fullp=$url;
$pos=strrpos($url, '/');
if(substr($url, -1, $pos) == '/'){
$page=" ";
}
else{
$page=basename($url);
}

$url = preg_replace("(https?://)", "", $url );
$len=strlen($url);
$pos=strrpos($url, '/');
$str=substr($url, 0, $pos);
$posn=strpos($url, '/');
$strn=substr($str, $posn, $pos);
$folder=$strn;

if(strlen($url)>4){

$sql2 = mysql_query("SELECT * FROM pages WHERE fullp = '$fullp'");
if(mysql_num_rows($sql2)>0){
while($ki= mysql_fetch_array($sql2))
  {
$times=$ki['inlinks'];
$times=$times+1;
mysql_query("UPDATE pages SET inlinks = '$times' WHERE fullp = '$fullp'");

}
}
else{

$ch = curl_init($fullp);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);
$title = preg_match('!<title>(.*?)</title>!i', $result, $matches) ? $matches[1] : 'No title found';
$line = preg_match('!<meta name="description" content="(.*?)">!i', $result, $matches) ? $matches[1] : $url;
$url="http://".$url;
$url=parse_url($url, PHP_URL_HOST);
$url = preg_replace("(https?://)", "", $url );
$sql="INSERT INTO pages(page, url, time, folder, line, fullp, title) VALUES ('$page', '$url', '$time', '$folder', '$line', '$fullp', '$title')";
mysql_query($sql,$con);

}

}
	
}

?>