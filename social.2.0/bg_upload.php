<?php

include('config.php');
include("resize-class.php");
$time=time();
$uid=$_COOKIE['iunv_id'];
$pk=$_COOKIE['iunv_pk'];
$allowed = array('png', 'jpg', 'gif','bmp');


if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	
$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);


	if(!in_array(strtolower($extension), $allowed)){
	
	echo '{"status":"error"}';

		exit;
	}

$fname=$_FILES['upl']['tmp_name'];
$nname=$time.'_iunv_'.$uid.'.jpg';
$folder='uploads/backgrounds/'.$uid.'/';
if (!is_dir($folder)){
mkdir($folder, 0777);
mkdir($folder.'thumbnails/', 0777);
}
if (!is_dir($folder.'thumbnails/')){
mkdir($folder.'thumbnails/', 0777);
}
$filex=$folder.$nname;
if(move_uploaded_file($fname, $filex)){
$filey=$folder.'thumbnails/'.$nname;
$resizeObj = new resize($filex);

	
$resizeObj -> resizeImage(333, 200, 'crop');

	
$resizeObj -> saveImage($filey, 50);

$imgsize = filesize($filex);
$sql="INSERT INTO user_uploads(uid, trackid, link, time) VALUES ('$uid', '$pk', '$nname', '$time')";
setcookie("iunv_bg", $nname);
if (!mysql_query($sql,$con)){echo('Error:!'.mysql_error());}
		echo '{"status":"success"}';

		exit;
	
}}

echo '{"status":"error"}';

exit;
?>