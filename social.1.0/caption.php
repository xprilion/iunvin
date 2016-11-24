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
$cap2=$_POST['cap'];
$sid=$_POST['sid'];
$cap = htmlspecialchars($cap2, ENT_QUOTES);
$tri=trim($cap);
if(strlen($tri)>0){
$sql="UPDATE uploads SET caption='$cap' WHERE sid='$sid'";
if (!mysql_query($sql,$con))
  {
  echo('Error:!'.mysql_error());
  }
$sqlx = mysql_query("SELECT * FROM uploads WHERE sid='$sid'");
while($picx= mysql_fetch_array($sqlx)){
$caption=$picx['caption'];
echo('<div id="caption">');
echo($caption);
echo('</div>');
}
}
else{
$sqlx = mysql_query("SELECT * FROM uploads WHERE sid='$sid'");
while($picx= mysql_fetch_array($sqlx)){
$caption=$picx['caption'];
echo('<div id="caption">');
echo($caption);
echo('</div>');

}
}
}

?>

