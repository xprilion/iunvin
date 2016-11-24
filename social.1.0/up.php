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
echo('<form enctype="multipart/form-data" action="upload" method="POST" id="ppho">
       Choose a photo : <input name="avatar" type="file" id="pphoto" /></input>');
echo('
    <input type="submit" value="Upload" id="pupload"/>
</form>

<font color="red"><big>Warning: file name should not be less than 3 charcters!</big></font>');
}
?>