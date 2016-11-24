<head><link rel="stylesheet" href="css/carousel.css">

<title> iunv </title>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script> 
<script src="js/jquery.nicescroll.min.js"></script> 
<script> 
  $(document).ready(function() {    
	$("#carousel").niceScroll();
	
  });
</script>

<style>
#viewit{

height: auto;
width: auto;
position: fixed;
left: 400px;
padding: 0.5em;
display: block;
-webkit-box-shadow: 0px 0px 50px 0px rgb(9, 248, 248) inset;
border-radius: 4px;
}

</style>

</head>
<body>
<div id="carousel"><?php

include('config.php');
$uname=$_COOKIE['iunv_uname'];


function listFolderFiles($dir){
include('config.php');
$uname=$_COOKIE['iunv_uname'];
    $ffs = scandir($dir);
    echo '<ol>';
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
            echo '<li><a href="edit.php?edit='.$dir.'/'.$ff.'">'.$ff;
            if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
            echo '</a></li>';
        }
    }
    echo '</ol>';

}


$folder='uploads/files/'.$uname;

echo('<b>');

if(!is_dir($folder)){
        mkdir($folder);         
        } 
echo('Notes');
echo('</b>');
listFolderFiles($folder);


?>