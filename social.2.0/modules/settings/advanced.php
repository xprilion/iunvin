<?php

$we=mysql_query("SELECT * FROM user_settings WHERE uid='$uid'");
$set=mysql_fetch_assoc($we);
$search=$set['search'];
$mem=$set['mem'];
$posts=$set['posts'];
$email=$set['email'];
$age=$set['age'];
$phone=$set['phone'];

if($search=='1'){
$sst='On';
}
else{
$sst='Off';
}
if($mem=='1'){
$mst='On';
}
else{
$mst='Off';
}
if($posts=='1'){
$pst='On';
}
else{
$pst='Off';
}
if($email=='1'){
$est='On';
}
else{
$est='Off';
}
if($age=='1'){
$ast='On';
}
else{
$ast='Off';
}
if($phone=='1'){
$phst='On';
}
else{
$phst='Off';
}
echo('
<div class="whiteDiv">
Click on the status buttons to toggle between On <div class="yn On"></div> and Off  <div class="yn Off"></div><br><hr>
<div class="yn '.$sst.' right" id="ynsearch" onclick=privacy("search")></div>
Display my profile in search
</div>
<div class="whiteDiv">
<div class="yn '.$mst.' right" id="ynmem" onclick=privacy("mem")></div>
Profile is visible to members only
</div>
<div class="whiteDiv">
<div class="yn '.$pst.' right" id="ynposts" onclick=privacy("posts")></div>
Display my posts to public
</div>
<div class="whiteDiv">
<div class="yn '.$est.' right" id="ynemail" onclick=privacy("email")></div>
Display my email
</div>
<div class="whiteDiv">
<div class="yn '.$ast.' right" id="ynage" onclick=privacy("age")></div>
Display my age
</div>
<div class="whiteDiv">
<div class="yn '.$phst.' right" id="ynphone" onclick=privacy("phone")></div>
Display my phone number 
</div>
<div class="whiteDiv">
<a class="portsa" onclick="changePass();">Change your password</a>
</div>
');
?>