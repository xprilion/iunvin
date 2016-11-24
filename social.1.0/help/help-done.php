<?php 
if(!isset($_POST['email'])){
Header('Location: /');
}

if(!isset($_POST['name'])){
Header('Location: /');
}

if(!isset($_POST['concern'])){
Header('Location: /');
}


include('header.php'); ?>
<title> Help </title>
<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
});
</script>


<div id="wall" onclick="document.getElementById('menu').style.display='none';">
<div id="helpbar">
<a href="./"><li> Help Central </li></a>
<a href="faq"><li> FAQ </li></a>
<a href="basics"><li> The Basics </li></a>
<a href="dashboard"><li> Dashing up </li></a>
<a href="friends"><li> Hunting friends </li></a>
<a href="messages"><li> Messaging </li></a>
<a href="photos"><li> Photo Sharing </li></a>
<a href="stories"><li> The Story Board </li></a>
<a href="myopicto"><li> Myopicto&reg; </li></a>
<a href="deleting"><li> Deleting stuff </li></a>
<a href="misc"><li> Misc </li></a>
</div>
<div id="helpcontent">
<h1> I You And We - are secure with us.</h1>
<?php
include('../config.php');
$concern=$_POST['concern'];
$email=$_POST['email'];
$name=$_POST['name'];
$time=time();
$sql="INSERT INTO help(who, email, time, concern)
VALUES
('$name','$email','$time','$concern')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

?>
<div id="concern">
Thankyou! We will contact you soon on the issue on your provided email.
</div>








</div>

