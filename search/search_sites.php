<?php

function siteFind($term){
include('config.php');
$g=a;
$sfind = mysql_query("SELECT * FROM sites WHERE url LIKE '%$term%' LIMIT 15");
while($sbo=mysql_fetch_assoc($sfind)){
$sres=$sbo['url'];
echo('<li>');
echo('<div id="info'.$g.'" class="info" onclick=alex("'.$g.'","'.$sres.'");>i</div>');
echo('<div id="alexa'.$g.'" class="alex"></div>');
echo($sres.'<br><br><a href="t?u=http://'.$sres.'&s='.$term.'"><div id="insta"> >> </div></a></li>');
$g++;
}
echo('<br>');
}

function multi_siteFind($term){
$s=$term;
$t= explode(" ", $term);
$zzz=0;
$ct=count($t);
$lll=0;
$n=0;
while($zzz<$ct){
$term=$t[$zzz];
$sfind = mysql_query("SELECT * FROM sites WHERE url LIKE '%$term%' LIMIT 15");
while($sbo=mysql_fetch_assoc($sfind)){
$sres[$zzz][$n]=$sbo['url'];
$n++;
}
$zzz++;
}
$b=array_values_recursive($sres);
$d=array_unique($b);
$dt=count($d);
$p=0;
while($p<$dt){
echo('<li>'.$d[$p]);
echo('<br><br><a href="t?u=http://'.$d[$p].'&s='.$s.'"><div id="insta"> >> </div></a></li>');
$p++;
}
echo('<br>');
}

function array_values_recursive($array)
{
    $arrayValues = array();

    foreach ($array as $value)
    {
        if (is_scalar($value) OR is_resource($value))
        {
             $arrayValues[] = $value;
        }
        elseif (is_array($value))
        {
             $arrayValues = array_merge($arrayValues, array_values_recursive($value));
        }
    }

    return $arrayValues;
}
?>