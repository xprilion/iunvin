<?php

error_reporting(0);

function multi_search($key){

if(isset($_GET['s'])){
if(strlen(trim($_GET['s']))>0){
include('config.php');
include('search_sites.php');
$term=$key;
multi_siteFind($term);
$t= explode(" ", $term);
$zzz=0;
$ct=count($t);
$lll=0;
while($zzz<$ct){
$term=$t[$zzz];
$exist = mysql_query("SELECT * FROM keywords WHERE keyword='$term'");
if(mysql_num_rows($exist)>0){
$lll++;
$sql = mysql_query("SELECT * FROM keywords WHERE keyword = '$term'");
$puk=mysql_fetch_assoc($sql);
$views=$puk['searches'];
$views++;
$sql3="UPDATE keywords SET searches = '$views' WHERE keyword = '$term'";
mysql_query($sql3,$con);

$find2 = mysql_query("SELECT * FROM xxx_$term ORDER BY  `xxx_$term`.`score` DESC 
LIMIT 0, 50");
$nnn=0;
while($res=mysql_fetch_assoc($find2)){
++$nnn;
$page[$zzz][$nnn]=$res['fullp'];
$site[$zzz][$nnn]=$res['site'];
$pagee=$res['fullp'];
$find4 = mysql_query("SELECT * FROM pages WHERE fullp = '$pagee'");
$les=mysql_fetch_assoc($find4);
$line[$zzz][$nnn]=$les['line'];
}
}
$zzz++;
}
}
	
	else{
echo('Maybe you are mistaken!');
}
}
	else{
echo('Maybe you are mistaken!');
}
if($lll>1){
if($lll==2){
$ipagesl= array_intersect($page[0], $page[1]);
$isitesl= array_intersect($site[0], $site[1]);
$ilinesl= array_intersect($line[0], $line[1]);

$ipagesm= array_intersect($page[1], $ipagesl);
$isitesm= array_intersect($site[1], $isitesl);
$ilinesm= array_intersect($line[1], $ilinesl);

$ipages=$ipagesm;
$isites=$isitesm;
$ilines=$ilinesm;
}

else if($lll==3){

$ipagesl= array_intersect($page[0], $page[1]);
$isitesl= array_intersect($site[0], $site[1]);
$ilinesl= array_intersect($line[0], $line[1]);

$ipagesm= array_intersect($page[1], $ipagesl);
$isitesm= array_intersect($site[1], $isitesl);
$ilinesm= array_intersect($line[1], $ilinesl);


$ipagesn= array_intersect($page[2], $ipagesm);
$isitesn= array_intersect($site[2], $isitesm);
$ilinesn= array_intersect($line[2], $ilinesm);

$ipages=$ipagesn;
$isites=$isitesn;
$ilines=$ilinesn;
}

else if($lll==4){
$ipagesl= array_intersect($page[0], $page[1]);
$isitesl= array_intersect($site[0], $site[1]);
$ilinesl= array_intersect($line[0], $line[1]);

$ipagesm= array_intersect($page[1], $ipagesl);
$isitesm= array_intersect($site[1], $isitesl);
$ilinesm= array_intersect($line[1], $ilinesl);


$ipagesn= array_intersect($page[2], $ipagesm);
$isitesn= array_intersect($site[2], $isitesm);
$ilinesn= array_intersect($line[2], $ilinesm);

$ipageso= array_intersect($page[3], $ipagesn);
$isiteso= array_intersect($site[3], $isitesn);
$ilineso= array_intersect($line[3], $ilinesn);
$ipages=$ipageso;
$isites=$isiteso;
$ilines=$ilineso;
}

else if($lll==5){
$ipagesl= array_intersect($page[0], $page[1]);
$isitesl= array_intersect($site[0], $site[1]);
$ilinesl= array_intersect($line[0], $line[1]);

$ipagesm= array_intersect($page[1], $ipagesl);
$isitesm= array_intersect($site[1], $isitesl);
$ilinesm= array_intersect($line[1], $ilinesl);


$ipagesn= array_intersect($page[2], $ipagesm);
$isitesn= array_intersect($site[2], $isitesm);
$ilinesn= array_intersect($line[2], $ilinesm);

$ipageso= array_intersect($page[3], $ipagesn);
$isiteso= array_intersect($site[3], $isitesn);
$ilineso= array_intersect($line[3], $ilinesn);

$ipagesp= array_intersect($page[4], $ipageso);
$isitesp= array_intersect($site[4], $isiteso);
$ilinesp= array_intersect($line[4], $ilineso);
$ipages=$ipagesp;
$isites=$isitesp;
$ilines=$ilinesp;
}

else if($lll==6){
$ipagesl= array_intersect($page[0], $page[1]);
$isitesl= array_intersect($site[0], $site[1]);
$ilinesl= array_intersect($line[0], $line[1]);

$ipagesm= array_intersect($page[1], $ipagesl);
$isitesm= array_intersect($site[1], $isitesl);
$ilinesm= array_intersect($line[1], $ilinesl);


$ipagesn= array_intersect($page[2], $ipagesm);
$isitesn= array_intersect($site[2], $isitesm);
$ilinesn= array_intersect($line[2], $ilinesm);

$ipageso= array_intersect($page[3], $ipagesn);
$isiteso= array_intersect($site[3], $isitesn);
$ilineso= array_intersect($line[3], $ilinesn);

$ipagesp= array_intersect($page[4], $ipageso);
$isitesp= array_intersect($site[4], $isiteso);
$ilinesp= array_intersect($line[4], $ilineso);

$ipagesq= array_intersect($page[5], $ipagesp);
$isitesq= array_intersect($site[5], $isitesp);
$ilinesq= array_intersect($line[5], $ilinesp);
$ipages=$ipagesq;
$isites=$isitesq;
$ilines=$ilinesq;
}

else if($lll==7){

$ipagesl= array_intersect($page[0], $page[1]);
$isitesl= array_intersect($site[0], $site[1]);
$ilinesl= array_intersect($line[0], $line[1]);

$ipagesm= array_intersect($page[1], $ipagesl);
$isitesm= array_intersect($site[1], $isitesl);
$ilinesm= array_intersect($line[1], $ilinesl);


$ipagesn= array_intersect($page[2], $ipagesm);
$isitesn= array_intersect($site[2], $isitesm);
$ilinesn= array_intersect($line[2], $ilinesm);

$ipageso= array_intersect($page[3], $ipagesn);
$isiteso= array_intersect($site[3], $isitesn);
$ilineso= array_intersect($line[3], $ilinesn);

$ipagesp= array_intersect($page[4], $ipageso);
$isitesp= array_intersect($site[4], $isiteso);
$ilinesp= array_intersect($line[4], $ilineso);

$ipagesq= array_intersect($page[5], $ipagesp);
$isitesq= array_intersect($site[5], $isitesp);
$ilinesq= array_intersect($line[5], $ilinesp);

$ipagesr= array_intersect($page[6], $ipagesq);
$isitesr= array_intersect($site[6], $isitesq);
$ilinesr= array_intersect($line[6], $ilinesq);

$ipages=$ipagesr;
$isites=$isitesr;
$ilines=$ilinesr;
}

else{
single_search($key);
}

$pc=count($ipages)+1;
$ccc=1;
while($ccc<$pc){
$mpage=$ipages[$ccc];
$msite=$isites[$ccc];
$mline=$ilines[$ccc];

echo('<li>');
echo('<div id="info'.$ccc.'" class="info" onclick=alex("'.$msite.','.$ccc.'");>i</div>');
echo('<div id="alexa'.$ccc.'" class="alex"></div>');
echo('<font color="#1288ff" size="4">'.$msite.'</font><br>'.$mline.'<hr><font color="#4B9B1E">'.$mpage.'</font><br>');
echo('<br><a href="t.php?url='.$mpage.'&s='.$key.'"><div id="insta">>></div></a>');
echo('</li>');


$ccc++;
}

$fpages=array();
foreach ($page as $val)
 {
    foreach($val as $val2)
     {
        $fpages[] = $val2;
     }
 }

$apage=array();
$fpc=count($fpages);
$t=0;
$u=0;
while($t<$fpc){
$gpage=$fpages[$t];
if (!in_array($gpage, $ipages)) {
$apage[$u]=$fpages[$t];
$u++;
}
$t++;
}

$bpage=array_unique($apage);
foreach ($bpage as $pak)
 {
$log=1;
$find5 = mysql_query("SELECT * FROM pages WHERE fullp = '$pak'");
while($tres=mysql_fetch_assoc($find5)){
$pageq=$tres['fullp'];
$siteq=$tres['url'];
$lineq=$tres['line'];
echo('<li>');
echo('<div id="info'.$log.'" class="info" onclick=alex("'.$siteq.','.$log.'");>i</div>');
echo('<div id="alexa'.$log.'" class="alex"></div>');
echo('<font color="#1288ff" size="4">'.$siteq.'</font><br>'.$lineq.'<hr><font color="#4B9B1E">'.$pageq.'</font><br>');
echo('<br><a href="t.php?url='.$mpage.'&s='.$key.'"><div id="insta">>></div></a>');
echo('</li>');
$log++;
}
}

}
else{
single_search($key);
}

}

function single_search($key){
include('config.php');
include('search_sites.php');
$ret=$key;
siteFind($ret);
$t= explode(" ", $ret);
$zzz=0;
$ct=count($t);
$ctr=trim($ret);
if(strlen($ctr)>0){
$lll=0;
$nf=0;
while($zzz<$ct){
$term=$t[$zzz];
$exist = mysql_query("SELECT * FROM keywords WHERE keyword='$term'");
if(mysql_num_rows($exist)>0){

$sqlqq = mysql_query("SELECT * FROM keywords WHERE keyword = '$term'");
$puk=mysql_fetch_assoc($sqlqq);
$views=$puk['searches'];
$views++;
$sqlqq3="UPDATE keywords SET searches = '$views' WHERE keyword = '$term'";
mysql_query($sqlqq3,$con);

$find = mysql_query("SELECT * FROM xxx_$term ORDER BY  `xxx_$term`.`score` DESC 
LIMIT 0 , 150");

$c=mysql_num_rows($find);
$c2=$c/15;
$c3=$c%15;
if($c3>0){
$c4=($c2-$c3/15)+1;
}
else{
$c4=$c2;
}

$i=1;
if(isset($_GET['page'])){
$i2=$_GET['page'];
$i=$i2*15-15;
}

if($c>15){
$i3=$i-1;

$j=$i+14;
}

else{
$i3=0;
$j=$c;
}
$bog=1;
$find2 = mysql_query("SELECT * FROM xxx_$term ORDER BY  `xxx_$term`.`score` DESC 
LIMIT $i3 ,$j");
while($res=mysql_fetch_assoc($find2)){
$site=$res['site'];
$fullp=$res['fullp'];
$find3 = mysql_query("SELECT * FROM pages WHERE fullp = '$fullp'");
$pes=mysql_fetch_assoc($find3);
$line=$pes['line'];
echo('<li>');
echo('<div id="info'.$bog.'" class="info" onclick=alex("'.$bog.'","'.$site.'")>i</div>');
echo('<div id="alexa'.$bog.'" class="alex"></div>');
echo('<font color="#1288ff" size="4">'.$site.'</font><br>'.$line.'<hr><font color="#4B9B1E">'.$fullp.'</font><br>');
echo('<br><a href="t.php?url='.$fullp.'&s='.$key.'"><div id="insta">>></div></a>');
echo('</li>');
$bog++;
}

$i=1;
if($c>15){
echo('<br><hr><div id="pagination">');
while($i<=$c4){
echo('<a href="?s='.$term.'&page='.$i.'">'.$i.'</a>&nbsp; &nbsp;');
$i++;
}
echo('</div>');
}
}

else{
$notfound[$nf]=$term;
$nf++;
}
$zzz++;
}

$tp=0;
while($tp<$nf){
$tr=$notfound[$tp];
echo('<div id="notInDb">Sorry! <b>'.$tr.'</b> was not found in our database! We regret inconvenience.');
echo('<br>You should try searching a more general term.</div>');

$tp++;
}

}

else{
echo("Don't you think that was too small to be searched?");
}
}
?>