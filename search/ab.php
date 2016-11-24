<?php

$a="http://google.com";
$b="http://google.com/mail/index.php";
$c="./find.php";
$d="../../try.php";
$e="/root.php";
$f="anuj.php?id=24";
$g="www.google.com?s=baby";
$h="www.iunv.in/help#local";
$i="../local?s=asnd#bonk";

urldo($e, $a);

function urldo($todo, $i){
$url=$todo;

//////////////////////////////
$u=parse_url($url);

$path=$u['path'];
$host = $u['host'];
$fragment=$u['fragment'];
$query=$u['query'];
//////////////////////////////
$pos=strpos($path, '/');
if($pos>=0){
echo dots($pos, $u, $i);
}

if(strlen($query)>0){
echo('?'.$query);
}

if(strlen($fragment)>0){
echo('#'.$fragment);
}

}


function dots($pos, $u, $i){
////////////////////////////////////
$host = $u['host'];
$path=$u['path'];
///////////////////////////////////
if($pos==1){
if(substr($path, 0, 2)=="./"){
$new=substr($path, 1);
$host=$i;
$rep = $host.$new;
return $rep;
}
}
else if($pos==2){
if(substr($path, 0, 3)=="../"){
$new=substr($path, 2);
$host="google.com";
$rep = $host.$new;
return $rep;
}
}
}

?>