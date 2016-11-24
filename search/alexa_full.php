<?php
error_reporting(0);
function alexa($url){
$source = file_get_contents('http://data.alexa.com/data?cli=10&dat=snbamz&url=http://'.$url);

//Alexa Rank
preg_match('/\<popularity url\="(.*?)" text\="([0-9]+)" source\="panel"\/\>/si', $source, $matches);
$aresult = ($matches[2]) ? $matches[2] : 0;
if($aresult>0){echo('Rank: '.$aresult);}

//Alexa Sites Linking in
preg_match('/\<linksin num\="([0-9]+)"\/\>/si', $source, $cocok);
$alinksin = ($cocok[1]) ? $cocok[1] : 0;
if($alinksin>0){echo('<br>Links in: '.$alinksin);}

preg_match('/\<reach rank\="([0-9]+)"\/\>/si', $source, $cocok);
$areach = ($cocok[1]) ? $cocok[1] : 0;
if($areach>0){echo('<br>Reach: '.$areach);}


preg_match('/\<COUNTRY CODE\="(.*?)"\/\>/si', $source, $matches);
$acountry = ($matches[1]) ? $matches[1] : 0;
if($acountry>0){echo('<br>Country: '.$acountry);}
}
?>