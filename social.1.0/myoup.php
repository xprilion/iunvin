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
echo('<form enctype="multipart/form-data" action="myopload" method="POST" id="ppho">
       Send this file: <input name="avatar" type="file" id="pphoto"/></input>');
echo('
    <input type="submit" value="Send File" id="pupload"/>
</form>

Warning: file name should not be less than 3 charcters!');
}
?>