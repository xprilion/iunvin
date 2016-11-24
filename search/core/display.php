<script>
function change(page){
window.history.pushState("object or string", "Title", page);
}
</script>
<?php

if(!isset($_GET['target'])){
$cur=$_SERVER['PHP_SELF'];
$pos=strrpos($cur, '/');
$cho=substr($cur, $pos+1);
}
else{
$cho=$_GET['traget'].".php";
}

if($cho=='index.php'){
include('dashboard.php');
echo('<script>
change("dashboard");
</script>');
}

if($cho=='texter.php'){
include('texter.php');
echo('<script>
change("texter");
</script>');
}

if($cho=='timer.php'){
include('timer.php');
echo('<script>
change("timer");
</script>');
}

if($cho=='texted.php'){
include('texted.php');
echo('<script>
change("texted");
</script>');
}


?>