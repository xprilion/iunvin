<div id="buksphotos">
<?php
include('../../config.php');
$uid=$_POST['quax'];
$oid=$_COOKIE['iunv_id'];
$vv=0;
if($oid!=$uid){
$ch=mysql_query("SELECT * FROM user_friends WHERE oid='$oid' AND uid='$uid'");
if(mysql_num_rows($ch)>0){
$p=mysql_fetch_assoc($ch);
$st=$p['status'];
if($st=='2'){
$ph=mysql_query("SELECT * FROM stories WHERE uid='$uid' AND type='2'");
if(mysql_num_rows($ph)>0){
while($po=mysql_fetch_assoc($ph)){
$vi=$po['visibility'];
if($vi=='1'){
$sid=$po['id'];
$sh=mysql_query("SELECT * FROM story_photos WHERE sid='$sid'");
while($so=mysql_fetch_assoc($sh)){
$cap=$so['caption'];
$img=$so['img'];
echo('<img class="littlepics lazy" onclick=photoview("uploads/images/'.$uid.'/'.$img.'") src="uploads/images/'.$uid.'/thumbnails/'.$img.'" />');
$vv++;
}
}
}
}
}
else{
echo 'Sorry we could not process your request. We apologise for inconvenience.';
}
}
}
else{
$ph=mysql_query("SELECT * FROM stories WHERE uid='$uid' AND type='2'");
if(mysql_num_rows($ph)>0){
while($po=mysql_fetch_assoc($ph)){
$vi=$po['visibility'];
if($vi=='1'){
$sid=$po['id'];
$sh=mysql_query("SELECT * FROM story_photos WHERE sid='$sid'");
while($so=mysql_fetch_assoc($sh)){
$cap=$so['caption'];
$img=$so['img'];
echo('<img class="littlepics lazy" onclick=photoview("uploads/images/'.$uid.'/'.$img.'") src="uploads/images/'.$uid.'/thumbnails/'.$img.'" />');
}
}
}
}
}


if($vv==0){
echo '<br><div style="margin-left: 5%;">No photos found!</div><br>';
}
?>
</div>