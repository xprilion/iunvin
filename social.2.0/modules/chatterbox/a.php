<link rel="stylesheet" href="chat.css">
<?php include('config.php');
include('check.php');
login_check();
$gid=$_GET['voila'];
$cid=$_GET['gil'];
include('scripts.php');
?>
<script>
$(document).ready(function(){
immi();
});
</script>
<div id="chat">
<?php echo('<div id="gid">'.$gid.'</div><div id="cid">'.$cid.'</div>'); ?>
<div class="topyc" onclick="chat_box()" ><div id="topy" class="effect6"> hi <div id="closi" onclick="close_box()"><center>X</center></div></div></div>
<div id="restc">
<div id="cMsgs"><?php include('first_recieve.php'); ?></div>
<div id="inBox"><div id="cSend" onclick="cSend()">Send</div>
<form name="chatbar" action="" method="post">
<textarea name="chattext" id="cText" ></textarea>
</form></div><div id="cErr"></div>
</div>
</div>
<div id="bluk" onclick="chat_box()"> hi </div>
