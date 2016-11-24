<?php
error_reporting(0);
$url=$_GET['url'];
$source = file_get_contents('http://data.alexa.com/data?cli=10&dat=snbamz&url=http://'.$url);

//Alexa Rank
preg_match('/\<popularity url\="(.*?)" text\="([0-9]+)" source\="panel"\/\>/si', $source, $matches);
$aresult = ($matches[2]) ? $matches[2] : 0;
if($aresult>0){echo('Rank: '.$aresult.' <a href="http://alexa.com/siteinfo/'.$url.'"><img src="alexa.ico" title="Powered by - Alexa.com"></a>');}
else{
echo('Rank data inavailable!');
}
?>
