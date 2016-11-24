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
$uid=$_POST['uid'];
$type=$_POST['sug'];

switch($type){
case 1: brokenlink(); break;
case 2: suggestion(); break;
case 3: other(); break;
}

}

function brokenlink(){
echo('Please write the full url of the page containing the link here: <br>
<form name="url">
<input type="text" id="fbin" placeholder="http://example.com/page.html" width="500px" name="rul" />
</form>
<div id="sendit" onclick="urlrep()" style="
background: #fcfcfc;
height: 20px;
width: 100px;
padding:4px;text-align: center;
box-shadow: 0px 1px 3px 0px #9f9f9f;
"> Report </div>
');
}

function suggestion(){
echo("What's amiss?:  <br>");
echo('
<form name="suggest">
<input type="text" id="fbin" width="500px" name="rul" />
</form>
<div id="sendit" onclick="sug()" style="

background: #fcfcfc;
height: 20px;
width: 100px;
padding:4px;text-align: center;
box-shadow: 0px 1px 3px 0px #9f9f9f;
" > Suggest </div>
');
}
function other(){
echo("What's amiss?:  <br>");
echo('
<form name="suggest">
<input type="text" id="fbin" width="500px" name="rul" />
</form>
<div id="sendit" onclick="oth()" style="
background: #fcfcfc;
height: 20px;
width: 100px;
padding:4px;text-align: center;
box-shadow: 0px 1px 3px 0px #9f9f9f;
"> Report </div>
');
}
?>