<div id="profff">
<?php
include('../../config.php'); 
$uid=$_COOKIE['iunv_id'];
$tr=mysql_query("SELECT * FROM account WHERE id='$uid'");
$er=mysql_fetch_assoc($tr);
$name=$er['name'];

$trr=mysql_query("SELECT * FROM user_info WHERE uid='$uid'");
$err=mysql_fetch_assoc($trr);
$job=$err['proffession'];
$martial=$err['martial'];
$dob=$err['dob'];

?>
<link rel="stylesheet" href="../../base.css">
<link href="../../assets/css/style.css" rel="stylesheet" />
<script src="../../js/jquery.min.js" charset="utf-8"></script>
<script src="../../assets/js/jquery.knob.js"></script>
<script src="../../assets/js/jquery.ui.widget.js"></script>
<script src="../../assets/js/jquery.iframe-transport.js"></script>
<script src="../../assets/js/jquery.fileupload.js"></script>
<script src="../../assets/js/script.js"></script>
<script src="../../assets/js/pro-script.js"></script>
<script src="../../js/scripts.js"  charset="utf-8"></script>
<script>
window.setInterval(function(){ppPreview()}, 1000);
function getCookie(c_name)
{
var c_value = document.cookie;
var c_start = c_value.indexOf(" " + c_name + "=");
if (c_start == -1)
{
c_start = c_value.indexOf(c_name + "=");
}
if (c_start == -1)
{
c_value = null;
}
else
{
c_start = c_value.indexOf("=", c_start) + 1;
var c_end = c_value.indexOf(";", c_start);
if (c_end == -1)
{
c_end = c_value.length;
}
c_value = unescape(c_value.substring(c_start,c_end));
}
return c_value;
}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

function ppPreview(){
var uid=getCookie("iunv_id");
var bgn=getCookie("iunv_ppn");
var bg=getCookie("iunv_pp");
if(bgn!=bg){
setCookie("iunv_pp", bgn);
$('#pPreview').fadeOut(150).empty();
if(bgn=='default'){
$('#pPreview').append('<img src="../../img/big_default.png">').fadeIn(150);
}
else{
$('#pPreview').append('<img src="../../uploads/images/'+uid+'/thumbnails/'+bgn+'">').fadeIn(150);
}
}
}


function saveProf(){

var fullname=$('#fullname').val();
var job=$('#proffession').val();
var dob=$('#dob').val();
var martial=$('#martial').val();
$.ajax({
 type: "POST",
 url: "saveProf.php",
 data: {fullname: fullname, job: job, dob: dob, martial: martial}
 }).done(function( result ) {
var stat=result;
if(stat!='error'){
msL();
alert(stat);
}
});
}
</script>
<div class="whiteDiv"><div class="right uMenO uMenOut" onclick="$('#photoSelect').toggle();">Upload</div>Profile Picture:<br>
<br><div id="photoSelect">
		<form id="upload" method="post" action="../../pro-upload.php" enctype="multipart/form-data">
			<div id="drop">
				Drop Here
				<a>Browse</a>
				<input type="file" name="upl" />
			</div>
<div id="photos"></div>
		</form>

</div>
<div id="pPreview">
<?php

$bgn=$_COOKIE["iunv_ppn"];
$bg=$_COOKIE["iunv_pp"];

if($bgn=="default"){
echo('<img src="../../img/big_default.png">');
}
else{
echo('<img src="../../uploads/images/'.$uid.'/thumbnails/'.$bgn.'">');
}

?></div>
</div>
<?php

echo('
<div class="whiteDiv">
<input id="fullname" class="textInput" value="'.$name.'" placeholder="Full name: "></input>
</div>
<div class="whiteDiv">Date of Birth: <input id="userdob" type="date" class="textInput" name="dob" min="1850-01-01" max="2010-12-31" value="'.$dob.'" placeholder="yyyy/mm/dd" /></div>
<div class="whiteDiv">
<input id="proffession" class="textInput" placeholder="Your proffession..." value="'.$job.'"></input>
</div>
<div class="whiteDiv">Martial status:<br>
<select name="martial" class="textInput" id="martial" value="'.$martial.'">					
<option value="Single">Single</option>
<option value="Married">Married</option>
<option value="In a relationship">In a relationship</option>
<option value="Complex">Complex</option>
<option value="Divorced">Divorced</option>
<option value="Unique">Unique</option>
</select>
</div>
');

?>
<div class="okSubmit defSubmit" onclick="saveProf()" id="stSave">Save</div><div class="defSubmit skipSubmit">Cancel</div><div class="defSubmit skipSubmit">Defaults</div>
<br>
<hr>
<br>
</div>