<style>
textarea {
height: 90%;
width: 100%;
padding: 5px;
margin:0px;
outline: none;
border: 2px solid #dfdfdf;
resize: none;
font-size: large;
 }

body{
background: #cdcdcd;
}
</style>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script> 
<script src="js/jquery.nicescroll.min.js"></script> 
<script> 
  $(document).ready(function() {    
	$("textarea").niceScroll();
	
  });
</script>
<form action="save.php" method="post">
<textarea autofocus="true" name="text">
<?php
$file=$_GET['edit'];
$lines = file($file);
foreach ($lines as $line_num => $line) {
    echo "" . htmlspecialchars($line) . "\n";
}


echo('
</textarea>
<input type="hidden" name="fiel" value="'.$file.'">');
?>
<input type="submit">
</form>