<?php

function keywordadd($key, $url, $string){
$key2=trim($key);
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

$find = $key;
$pos=strpos($string, $key);
$bef=$pos-50;
$aft=$pos+50;
$line=substr($string, $bef, $aft);

$page=$url;
$site=parse_url($url, PHP_URL_HOST);
$site = preg_replace("(https?://)", "", $site );
$sql="INSERT INTO xxx_$key(page, site, time, line) VALUES ('$page', '$site', '$time', '$line')";
mysql_query($sql,$con);
}
}
else{
$sql="INSERT INTO keywords(keyword, time) VALUES ('$key', '$time')";
mysql_query($sql,$con);

$create="CREATE TABLE  `xxx_$key` (
 `id` INT( 100 ) NOT NULL AUTO_INCREMENT ,
 `site` TEXT NOT NULL ,
 `page` TEXT NOT NULL ,
 `line` TEXT NOT NULL ,
 `clicks` INT( 100 ) NOT NULL ,
 `score` INT( 100 ) NOT NULL ,
 `time` INT( 100 ) NOT NULL ,
PRIMARY KEY (  `id` )
) ENGINE = INNODB DEFAULT CHARSET = latin1; ";
mysql_query($create,$con);


///////

$find = $key;
$pos=strpos($string, $key);
$bef=$pos-50;
$aft=$pos+50;
$line=substr($string, $bef, $aft);

$page=$url;
$site=parse_url($url, PHP_URL_HOST);
$site = preg_replace("(https?://)", "", $site );
$sql="INSERT INTO xxx_$key(page, site, time, line) VALUES ('$page', '$site', '$time', '$line')";
mysql_query($sql,$con);

}
}
}


function imageadd($image, $url){
include('config.php');
$time=time();
$sql2 = mysql_query("SELECT * FROM images WHERE url = '$image'");
if(!mysql_num_rows($sql2)){
$sql="INSERT INTO images(url, time) VALUES ('$image', '$time')";
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

$url = preg_replace("(https?://)", "", $url );
$page = basename($url);
if(strlen($url)>4){

$sql2 = mysql_query("SELECT * FROM pages WHERE url = '$url' AND page = '$page'");
if(mysql_num_rows($sql2)>0){
while($ki= mysql_fetch_array($sql2))
  {
$times=$ki['inlinks'];
$times=$times+1;
mysql_query("UPDATE pages SET inlinks = '$times' WHERE url = '$url' AND page = '$page'");

}
}
else{
$url="http://".$url;
$url=parse_url($url, PHP_URL_HOST);
$url = preg_replace("(https?://)", "", $url );
$sql="INSERT INTO pages(page, url, time) VALUES ('$page', '$url', '$time')";
mysql_query($sql,$con);

}

}
	
}

?>