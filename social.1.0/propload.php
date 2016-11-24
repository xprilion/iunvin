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
$uname=$_COOKIE['iunv_uname'];
$file=basename($_FILES['avatar']['name']);
$time=time();
$file_name=basename($_FILES['avatar']['name']);
    $length_of_filename = strlen($file_name);
    $last_char = substr($file_name, $length_of_filename - 1, 1);
    for($i_parse_name = 0; $i_parse_name < $length_of_filename; $i_parse_name++)
    {

        $last_char = substr($file_name, $length_of_filename - $i_parse_name + 2, 1);
        if($last_char == ".")
        {
            $filename_suffix = substr($file_name, $length_of_filename - $i_parse_name + 2, $i_parse_name);
            $filename_prefix = substr($file_name, 0, $length_of_filename - strlen($filename_suffix));
            $i_parse_name = $length_of_filename;
        }
    }

$ext=$filename_suffix;

if(($ext=='.jpg') || 
	($ext=='.JPG') ||
	($ext=='.gif') ||
	($ext=='.GIF') ||
	($ext=='.png') ||
	($ext=='.PNG') ||
	($ext=='.bmp') ||
	($ext=='.BMP') ||
	($ext=='.jpeg') ||
	($ext=='.JPEG')  ){

}

if(     ($ext=='.mp3') || 
	($ext=='.MP3') ||
	($ext=='.aac') ||
	($ext=='.AAC') ||
	($ext=='.wav') ||
	($ext=='.WAV')  ){

die();

}

if(     ($ext=='.php') || 
	($ext=='.php3') ||
	($ext=='.PHP') ||
	($ext=='.hmtl') ||
	($ext=='.hmt') ||
	($ext=='.HTML') || 
	($ext=='.txt') ||
	($ext=='.TXT') ||
	($ext=='.doc') ||
	($ext=='.docx') ||
	($ext=='.js') ){

die();
}


if(     ($ext=='.mpg') || 
	($ext=='.mpeg') ||
	($ext=='.MPG') ||
	($ext=='.MPEG') ||
	($ext=='.flv') ||
	($ext=='.FLV') || 
	($ext=='.mov') ||
	($ext=='.MOV') ||
	($ext=='.wmv') ||
	($ext=='.WMV') ||
	($ext=='.3GP') || 
	($ext=='.avi') ||
	($ext=='.AVI') ||
	($ext=='.3gp') ){

die();
}


$uploaddir = './uploads/images/'.$uname.'/';

if(!is_dir($uploaddir)){
        mkdir($uploaddir);         
        } 
$uploadfile = $uploaddir.'iunv_'.$time.$ext;

if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
$piccy='iunv_'.$time.$ext;
include('resizeimage.php');
$folder = 'uploads/images/'.$uname.'/thumbnails';
$uri = $folder.'/iunv_'.$time;
if (!is_dir($folder)){
mkdir($folder, 0777);
}
$width=200;
$height=200;
new resizeimage($piccy, $ext , $uri , $width, $height, 0, 80,'');

$folder = 'uploads/images/'.$uname.'/show';
$uri = $folder.'/iunv_'.$time;
if (!is_dir($folder)){
mkdir($folder, 0777);
}
$width=500;
$height=500;
new resizeimage($piccy, $ext , $uri , $width, $height, 0, 80,'');


$name=$_COOKIE['iunv_name'];
$uid=$_COOKIE['iunv_id'];
$wext='<img src="uploads/images/'.$uname.'/show/'.$piccy.'">';


$sqlx = "INSERT INTO streams(uid, name, username, text, time, type) VALUES ('$uid', '$name', '$uname', '$wext', '$time', '5')";

if (!mysql_query($sqlx,$con))
  {
  die('Error: ' . mysql_error());
  }

$sqlp = mysql_query("SELECT * FROM streams WHERE uid='$uid' AND text='$wext'");
while($streams= mysql_fetch_array($sqlp))
  {
$mig=$streams['id'];
$sql = "INSERT INTO uploads(uid, url, time, type, sid) VALUES ('$uid', '$piccy', '$time', 'images' , '$mig')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

}


$sqlxx = "UPDATE account SET avatar='$piccy' WHERE id='$uid'";

if (!mysql_query($sqlxx,$con))
  {
  die('Error: ' . mysql_error());
  }


$expire=time()-3600;
setcookie("iunv_upicc", 'abc' , $expire);
$expire2=time()+60*60*24*30;
setcookie("iunv_upicc", $piccy, $expire2, '/');
echo('<META HTTP-EQUIV="refresh" CONTENT="0; photos">');

} 
else {
    echo "ERROR!";
}
}
?>