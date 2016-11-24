<?php

$commands= array(
"check",
"stories",
"writeStory", 
"ads",
"profile", 
"name",
"theme"
);

function comm($word, $uname){
include('config.php');
$sql = mysql_query("SELECT * FROM account WHERE username='$uname'");
$s= mysql_fetch_assoc($sql);
$uid=$s['id'];
$upic=$s['propic'];
$upicth='img/thumb_default.png';
$upicbg='img/big_default.png';
if($upic!='default'){
$upicth='uploads/images/'.$uid.'/thumbnails/'.$upic;
$upicbg='uploads/images/'.$uid.'/'.$upic;
}
$name=$s['name'];
setcookie("iunv_pp", $upic, 0, '/new/modules/profile');
setcookie("iunv_ppn", $upic, 0, '/new/modules/profile');
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

////////////////////name/////////////

if($word=='name'){
echo $name;
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

///////////////profile///////////////

if($word=='profile'){
$sqlb= mysql_query("SELECT * FROM user_info WHERE uid='$uid'");
$e=mysql_fetch_assoc($sqlb);
$bio=$e['bio'];
$dob2=$e['dob'];
$dob= date("jS F, Y", strtotime($dob2)); 
$special=$e['speciality'];
$job=$e['proffession'];
$school=$e['school'];
$univ=$e['university'];
$college=$e['college'];
$martial=$e['martial'];
$language=$e['languages'];
$expertise=$e['expertise'];
$oid=$_COOKIE['iunv_id'];
$ch=mysql_query("SELECT * FROM user_friends WHERE uid='$oid' AND oid='$uid'");
if(mysql_num_rows($ch)==0){
$cho=mysql_query("SELECT * FROM user_friends WHERE oid='$oid' AND uid='$uid'");
$cco=mysql_fetch_assoc($cho);
$cso=$cco['status'];
if($cso=='1'){
$friendstat='Accept request';
}
else{
$friendstat='Add as friend';
}

}
else if(mysql_num_rows($ch)==1){
$cc=mysql_fetch_assoc($ch);
$cs=$cc['status'];
if($cs=='1'){
$friendstat='Pending';
}
else if($cs=='2'){
$friendstat='Friends';
}
}
echo('<table class="streamtb1" style="background: rgba(30, 255, 0, 0.3);">
	<tr>
		<td class="vertd" width="30%">
			<img src="'.$upicth.'" height="127px" width="127px" id="bigProfilePic" onclick=photoview("'.$upicbg.'")>
		</td>
		<td class="vertd">
			<table class="streamtb1">
				<tr>
					<td class="vertd">
						'.$name.' ('.$uname.')
					</td>
				</tr>
				<tr>
					<td class="vertd" type="date">
						'.$dob.'
					</td>
				</tr>
				<tr>
					<td class="vertd">
						'.$martial.'
					</td>
				</tr>
				<tr>
					<td class="vertd">
						'.$job.'
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>');
echo('<div id="uMen">');
$ty=$_COOKIE['iunv_uname'];
if($uname!=$ty){
echo('<div id="uxfr'.$uid.'" class="uMenO uMenOut right" onclick=friends("'.$uid.'")>'.$friendstat.'</div>');
}
else{
echo('<div id="proeditopt" class="uMenO uMenOut right" onclick=leEdit()>Edit Profile</div>');
}
echo('<div id="uxabout" class="uMenO uMenOut" onclick=ux("about","'.$uid.'")>About</div>
<div id="uxphotos" class="uMenO uMenOut" onclick=ux("photos","'.$uid.'")>Photos</div>
<div id="uxfriends"class="uMenO uMenOut" onclick=ux("friends","'.$uid.'")>Friends</div>
</div>
');

echo('<div id="uxoabout" class="uxo"><table class="streamtb1">
	<tr>
		<td class="vertd tds blun bol">
			Bio
		</td>
		<td class="vertd tds blun proedit" id="bioBio">
			'.$bio.'
		</td>
	</tr>
	<tr>
		<td class="vertd tds blun bol">
			Speciality
		</td>
		<td class="vertd tds blun proedit" id="bioSpecial">
			'.$special.'
		</td>
	</tr>
	<tr>
		<td class="vertd tds blun bol">
			Languages known
		</td>
		<td class="vertd tds blun proedit" id="bioLang">
			'.$language.'
		</td>
	</tr>
	<tr>
		<td class="vertd tds blun bol">
			Expert at
		</td>
		<td class="vertd tds blun proedit" id="bioExp">
			'.$expertise.'
		</td>
	</tr>
	<tr>
		<td class="vertd tds blun bol">
			School
		</td>
		<td class="vertd tds blun proedit" id="bioSkul">
			'.$school.'
		</td>
	</tr>
	<tr>
		<td class="vertd tds blun bol">
			College
		</td>
		<td class="vertd tds blun proedit" id="bioCol">
			'.$college.'
		</td>
	</tr>
	<tr>
		<td class="vertd tds bol">
			University
		</td>
		<td class="vertd tds proedit" id="bioUni">
			'.$univ.'
		</td>
	</tr>
</table></div>
<div id="uxophotos" class="uxo"><center><img src="loading.gif"></center></div>
<div id="uxofriends" class="uxo"><center><img src="loading.gif"></center></div>');
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