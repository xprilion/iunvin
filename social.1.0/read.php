<?php

function listFolderFiles($dir){
    $ffs = scandir($dir);
    echo '<ol>';
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
            echo '<li>'.$ff;
            if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
            echo '</li>';
        }
    }
    echo '</ol>';

}

include('config.php');
$uname=$_COOKIE['iunv_uname'];

$folder=array('uploads/images/'.$uname, 'uploads/files/'.$uname, 'uploads/songs/'.$uname, 'uploads/videos/'.$uname);
$x=count($folder);
$fol=array('images', 'files', 'songs', 'videos');
$a=0;
while($a<$x){
echo('<b>');
$folid=$folder[$a];
if(!is_dir($folid)){
        mkdir($folid);         
        } 
echo($fol[$a]);
echo('</b>');
listFolderFiles($folder[$a]);
$a++;
}
?>