<?php

include('config.php');
error_reporting(0);
$term=$_GET['s'];

$exist = mysql_query("SELECT * FROM keywords WHERE keyword='$term'");
if(mysql_num_rows($exist)>0){

$find = mysql_query("SELECT * FROM xxx_$term ORDER BY  `xxx_$term`.`score` DESC ");
$array = array();
while ($row = mysql_fetch_array($find)) {
    $array[] = $row['site'];
}

$sites=array_unique($array);
$cou=count($sites);
$i=0;
while($i<$cou){
$site=$sites[$i];
$img = mysql_query("SELECT * FROM images WHERE site = '$site' ORDER BY  `images`.`rank` DESC ");
while ($bip= mysql_fetch_array($img)) {
$images[] = $bip['url'];
$folders[]=$bip['folder'];
$sitesx[]=$bip['site'];
$pages[]=$bip['page'];
$iids[]=$bip['id'];
}


$i++;
}

$c=count($images);
$c2=$c/15;
$c3=$c%15;
if($c3>0){
$c4=($c2-$c3/15)+1;
}
else{
$c4=$c2;
}

if($c>15){
echo('<div id="pagination">');
$n=1;
while($n<=$c4){
echo('<a href="?s='.$term.'&page='.$n.'">'.$n.'</a>&nbsp; &nbsp;');
$n++;
}

$n=0;
if(isset($_GET['page'])){
$n2=$_GET['page'];
$n=$n2*15-15;
}
$n3=$n-1;
if(isset($_GET['page'])){
if(!$n2==$c4){
$j=$n+15;
$l=15;
}
else if($n2==1){
$j=$n+15;
$l=15;
}

else{
$kl=$n+($c-($n2*15-15));
$j=$kl;
$l=($c-($n2*15-15));
}
}

else{
$j=$n+15;
$l=15;
}
echo('</div>');
}

else{
$n=0;
$j=$c;
$l=$c;
}
echo('<div id="pics"><table>');
$o=0;
while($n<$j){

$image=$images[$n];
$folder=$folders[$n];
$sitex=$sitesx[$n];
$iid=$iids[$n];
$pagex="http://".$sitex.$folder.'/'.$pages[$n];
$image=$sitex.$folder.'/'.$image;
echo('<br><tr><div id="picci"><a href="'.$pagex.'">'.$sitex.'</a><br><img class="sepic" src="http://'.$image.'"  onclick="immi('.$o.','.$l.','.$iid.')"></div></tr><br>');

$n++;
$o++;
}
echo('</table></div>');
$c=count($images);
$c2=$c/15;
$c3=$c%15;
if($c3>0){
$c4=($c2-$c3/15)+1;
}
else{
$c4=$c2;
}

if($c>15){
echo('<div id="pagination">');
$n=1;
while($n<=$c4){
echo('<a href="?s='.$term.'&page='.$n.'">'.$n.'</a>&nbsp; &nbsp;');
$n++;
}

$n=0;
if(isset($_GET['page'])){
$n2=$_GET['page'];
$n=$n2*15-15;
}
$n3=$n-1;
if(isset($_GET['page'])){
if(!$n2==$c4){
$j=$n+15;
$l=15;
}
else if($n2==1){
$j=$n+15;
$l=15;
}

else{
$kl=$n+($c-($n2*15-15));
$j=$kl;
$l=($c-($n2*15-15));
}
}

else{
$j=$n+15;
$l=15;
}
echo('</div>');
}

else{
$n=0;
$j=$c;
$l=15;
}
while($n<$j){
$u=1;
$multi=array();
while($u<$c){
$mul=$u*3;
$multi[$u]=$mul;
$u++;
}
if(in_array($n, $multi)){
}
$image=$images[$n];
$folder=$folders[$n];
$sitex=$sitesx[$n];
$iid=$iids[$n];
$pagex="http://".$sitex.$folder.'/'.$pages[$n];
$image=$sitex.$folder.'/'.$image;
echo('<img src="http://'.$image.'" class="support">');

$n++;
}

}

else{

echo('Sorry! <b>'.$term.'</b> was not found in our database! We regret inconvenience.');
echo('<hr> You may try searching a more general term.');
}

?>
