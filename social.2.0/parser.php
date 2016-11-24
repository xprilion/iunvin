<?php

$commands= array(
"name",
"uname",
"check",
"writeStory", 
"join", 
"birthdays", 
"ads",
"theme"
);

function comm($word){
include('config.php');
$uid=$_COOKIE['iunv_id'];
$uname=$_COOKIE['iunv_uname'];
$sql = mysql_query("SELECT * FROM account WHERE id='$uid'");
$s= mysql_fetch_assoc($sql);
$upic=$s['propic'];
if($upic=='default'){
$upicth='img/thumb_default.png';
$upicbg='img/big_default.jpg';
}
$name=$s['name'];

////////////////////check/////////////

if($word=='check'){
$cokie=$_COOKIE['iunv_rex'];
$sql = mysql_query("SELECT * FROM user_active WHERE uid='$uid'");
while($auth= mysql_fetch_array($sql)){
$rex=$auth['rex'];
}
if((!$rex==$cokie) || (!isset($_COOKIE['iunv_id']))){
echo("
<script>
window.location.replace('./logout');
</script>
");
exit();
}

}

////////////////////theme/////////////

if($word=='theme'){
$them=mysql_query("SELECT * FROM user_settings WHERE uid='$uid'");
$theme="iunv.css";
if(mysql_num_rows($them)>0){
$the=mysql_fetch_assoc($them);
$background=$the['background'];
$theme=$the['theme'];
}
else{
$background='default';
$theme='iunv.css';
}

if($background=='default'){
$bg="img/bcubes.jpg";
}
else{
$bg="uploads/backgrounds/".$uid."/".$background;
}
setcookie("iunv_bg", $background);
setcookie("iunv_th", $theme);
echo('<style>');
echo("
#wrapper{background: url('".$bg."');}");
include('themes/'.$theme);
echo('</style>');
}

///////////////////new post////////////

if($word=='writeStory'){
echo ('
<div id="posting">
<div id="postType">
<li id="postPhoto" title="Add a pic!" onclick="postPhoto()" class="typeinactive"> <img src="img/photo.jpg"> </li>
<li id="postDoText" title="Post it!" class="typeinactive postDo" onclick="postItText()"> <img src="img/post2.png"></li>
<li id="postDoPhoto" title="Post it!" class="typeinactive postDo" onclick="postItPhoto()"> <img src="img/post2.png"></li>
</div>
<form name="post" action="" method="post" id="postingForm">
<textarea id="postText" class="postText" placeholder="Anything on your mind?"></textarea>
<textarea id="photoCap" class="postText" placeholder="');
echo("What's up with this photo?");
echo('"></textarea>
</form>
<div id="photoSelect">
		<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
			<div id="drop">
				Drop Here
				<a>Browse</a>
				<input type="file" name="upl" multiple />
			</div>
<div id="photos"></div>
		</form>

</div>
</div>
');
}

///////////////userbio///////////////

if($word=='userbio'){
echo '<br><img src="../uploads/images/admin/thumbnails/'.$pic.'" id="bigProfilePic">';
echo $name;
}

//////////////////////join-form///////////

if($word=='join'){
echo('<div id="jf1">
<form name="signup2" action="" method="post" id="joinForm">
<input id="fullname" class="textInput" placeholder="Full name: "></input>
<div class="whiteDiv">Date of Birth: <input id="userdob" type="date" class="textInput" name="dob" min="1850-01-01" max="2010-12-31" value="1990-01-01" placeholder="yyyy/mm/dd" /></div>
<textarea id="userbio" class="postText" placeholder="');
echo("A short introduction to you...");
echo('"></textarea>
<textarea id="userspecial" class="postText" placeholder="');
echo("Something special about you...");
echo('"></textarea>
</form>');
echo('<div class="defSubmit okSubmit" onclick="signup1()"> Continue </div>');
echo('<div class="defSubmit skipSubmit" onclick="skipsignup1()"> Skip this step </div>');
echo('<br><hr><br>');
echo('<hr><br></div><div id="jf2">');
echo('<div class="defSubmit skipSubmit" onclick="prevsignup1()"> Previous </div>
<br><br><br>
<form name="signup3" action="" method="post" id="joinForm2">
<div class="whiteDiv">Continent:<br><select name="continent" id="continent" class="textInput" onchange=getplaces(this.value,"country");>					
<option value="">Select</option>
<option value="6255146">Africa</option>
<option value="6255152">Antarctica</option>
<option value="6255147">Asia</option>
<option value="6255148">Europe</option>
<option value="6255149">North America</option>
<option value="6255151">Oceania</option>
<option value="6255150">South America</option>
</select>
</div>
<div class="whiteDiv">Country:<br> <select name="country" class="textInput" id="country" onchange=getplaces(this.value,"province");>
<option value=""></option>						
</select>
</div>
<div class="whiteDiv">State / Provice:<br> <select name="province" class="textInput" id="province" onchange=getplaces(this.value,"region")>
<option value=""></option>
</select>
</div>
<div class="whiteDiv">County / Region:<br> <select name="region" class="textInput" id="region" onchange=getplaces(this.value,"city")>
<option value=""></option>
</select>
</div>
<div class="whiteDiv">City:<br> <select name="city" class="textInput" id="city">
<option value=""></option></select>
</div>
<div class="whiteDiv">Phone:<br> <input name="userphone" maxlength="10" class="textInput" id="phone" placeholder="XXXXXXXXXX" />
</div>
</form>
');
echo('<div class="defSubmit okSubmit" onclick="dothis()"> Continue </div>');
echo('<div class="defSubmit skipSubmit" onclick="skipsignup2()"> Skip this step </div>');
echo('<br><hr><br>');
echo('<hr><br></div><div id="jf3">');
echo('<div class="defSubmit skipSubmit" onclick="prevsignup2()"> Previous </div>
<form name="signup4" action="" method="post" id="joinForm3">
<input id="proffession" class="textInput" placeholder="Your proffession..."></input>
<textarea id="expertise" class="postText" placeholder="');
echo("What are you expert at...");
echo('"></textarea>
<input id="school" class="textInput" placeholder="Your school: "></input>
<input id="college" class="textInput" placeholder="Your college: "></input>
<input id="university" class="textInput" placeholder="Your university: "></input>
<textarea id="language" class="postText" placeholder="');
echo("Which languages do you know...");
echo('"></textarea>
<div class="whiteDiv">Martial status:<br>
<select name="martial" class="textInput" id="martial">					
<option value="Single">Single</option>
<option value="Married">Married</option>
<option value="In a relationship">In a relationship</option>
<option value="Complex">Complex</option>
<option value="Divorced">Divorced</option>
<option value="Unique">Unique</option>
</select>
</div>
</form>');
echo('<div class="defSubmit okSubmit" onclick="justdothis()"> Continue </div>');
echo('<div class="defSubmit skipSubmit" onclick="skipsignup3()"> Skip this step </div>');
echo('<br><hr><br></div>');
}

////////////////////birthdays/////////////

if($word=='birthdays'){
$date=date('Y-m-d');
$r=0;
$sql = mysql_query("SELECT * FROM user_friends WHERE oid='$uid' AND status='2'");
if(!mysql_num_rows($sql)==0){
while($fr= mysql_fetch_array($sql)){
$id=$fr['uid'];
$sql2 = mysql_query("SELECT * FROM user_info WHERE dob='$date'");
while($bd= mysql_fetch_array($sql2)){
echo('Birthdays!');
$r++;
}
}
}
if($r==0){
echo 'No birthdays today!';
}
}

}

/////////////////story type///////////
function story_type($type, $text, $img){
include('config.php');
$uname=$_COOKIE['iunv_uname'];
$uid=$_COOKIE['iunv_id'];
$sql = mysql_query("SELECT * FROM account WHERE id='$uid'");
$s= mysql_fetch_assoc($sql);
$upic=$s['propic'];
if($upic=='default'){
$upicth='img/thumb_default.png';
$upicbg='img/big_default.jpg';
}
$name=$s['name'];

if($type=='1'){
echo '<table class="streamtb"><tr><td class="imtd"><a href="'.$uname.'" title="'.$name.'"><img class="lazy proThumb" src="'.$upicth.'"></a></td><td><table class="streamtb"><tr><td><a href="'.$uname.'" class="portsa" title="'.$name.'">'.$name.'</a></td></tr><tr><td><div class="dstory"> '.$text.'</div></td></tr></table></td></tr></table>';
}
elseif($type=='2'){
echo '<table class="streamtb"><tr><td class="imtd"><a href="'.$uname.'" title="'.$name.'"><img class="lazy proThumb" src="'.$upicth.'"></a></td><td><table class="streamtb"><tr><td><a href="'.$uname.'" class="portsa" title="'.$name.'">'.$name.'</a></td></tr><tr><td><div class="dstory"> '.$text.'<br><br><img class="lazy streamsim" src="uploads/images/'.$uid.'/thumbnails/'.$img.'" onclick=photoview("uploads/images/'.$uid.'/'.$img.'")></div></td></tr></table></td></tr></table>';
}
elseif($type=='4'){
echo 'You uploaded a pic: <br>'.$text;
}
elseif($type=='5'){
echo 'You updated your profile picture <hr>'.$text;
}
else{
}
}

function track($work){
include('config.php');
$uid=$_COOKIE['iunv_id'];
$rex=$_COOKIE['iunv_rex'];
$time=time();
mysql_query("UPDATE user_active SET last='$time' WHERE uid='$uid' AND rex='$rex'");
$sql="INSERT INTO user_tracker (uid, work, time) VALUES ('$uid', '$work', '$time')";
mysql_query($sql, $con);
}

function pk(){
$prk=rand(1, 99999999);
$pkn=md5($prk.'tiny');
$expire=time()+60*60*24*30;
setcookie("iunv_pk", $pkn , $expire, '/');
}

function sidebar(){
echo('		<a href="dashboard"><li class="mainli" onclick=navto("dashboard")>Dashboard</li></a>
		<a href="profile"><li  class="mainli" onclick=navto("profile")>Profile</li></a>
		<a href="friends"><li  class="mainli" onclick=navto("friends")>Friends</li></a>
		<a href="photos"><li  class="mainli" onclick=navto("photos")>Photos </li></a>
		<a href="settings"><li  class="mainli" onclick=navto("settings")> Settings </li></a>
		<div id="wChatCss"></div>
		<div id="wChatJs"></div>
		<div id="wChatMain"></div>
');
}
?>