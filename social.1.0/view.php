<?php
include('config.php');
$cokie=$_COOKIE['iunv_sessid'];
$uid=$_COOKIE['iunv_id'];
$rex=1;
$sql = mysql_query("SELECT * FROM active WHERE id='$uid'");
while($auth= mysql_fetch_array($sql)){
$rex=$auth['cookie'];
}
if(!$rex==$cokie){
Header('Location: log-in');
exit();
}
else{
if(!isset($_GET['sid'])){
HEADER('Location: dashboard');
}

else{
$id=$_GET['sid'];
$uid=$_COOKIE['iunv_id'];
$q = mysql_query("SELECT * FROM streams WHERE id='$id'"); 
$r = mysql_fetch_assoc($q);
$text = $r["text"]; 
$id = $r["id"]; 
?>
<script>
function rate(rating){ 
var data = 'rating='+rating+'&id=<?php echo $id; ?>';
$.ajax({
type: 'POST',
url: 'like.php',
data: data,
success: function(e){
$("#ratings").html(e); 
}
});
}
</script>
<style>

#like {
cursor: pointer;
}
</style>
<?php

    $q2 = mysql_query("SELECT * FROM likes WHERE sid='$id'");
    $likes = mysql_num_rows($q2);

    $l = 'icon/like.png';
    
    $q3 = mysql_query("SELECT * FROM likes WHERE sid='$id' AND uid='$uid'");
   $count=mysql_num_rows($q3);
    
    if($count>0){
        $l = 'icon/liked.png';
    }
  
    $m = '<img id="like" onClick="rate($(this).attr(\'id\'))" src="'.$l.'"> '.$likes.' &nbsp;&nbsp';
    echo '<div id="ratings">'.$m.'</div>';
}
}
?>