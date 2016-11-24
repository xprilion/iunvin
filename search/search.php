<?php
include('config.php');
include('secret.php');
$term=$_GET['s'];
addu($term);
$t= explode(" ", $term);
$zzz=0;
$ct=count($t);
if($ct>1){
multi_search($term);
}
else{
single_search($term);
}

function addu($term){
include('config.php');
$time=time();
$ip=$_SERVER['REMOTE_ADDR'];
$sql = mysql_query("SELECT * FROM searches WHERE term = '$term'");
if(!mysql_num_rows($sql)){
$sql="INSERT INTO searches(term, time, ip) VALUES ('$term', '$time', '$ip')";
mysql_query($sql,$con);
}
else{
$puk=mysql_fetch_assoc($sql);
$views=$puk['views'];
$views++;
$sql3="UPDATE searches SET views = '$views' WHERE term = '$term'";
mysql_query($sql3,$con);
}
}
?>
<br>
<br>
<hr>
&copy; iunv, 2013 - All Rights Reserved.