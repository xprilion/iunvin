<title>Chat Plugin</title><link rel="stylesheet" href="chatterbox/chat.css">
<?php include('config.php'); 
$sid=$_COOKIE['iunv_id'];
mysql_query("UPDATE account SET online=1 WHERE id='$sid'");
$fnum=0;
$pnum=0;
$friends= mysql_query("SELECT * FROM friends WHERE fid='$sid'");
while($frends=mysql_fetch_assoc($friends)){
$fid=$frends['uid'];
$fn= mysql_query("SELECT * FROM account WHERE id='$fid'");
while($fri=mysql_fetch_assoc($fn)){
$online=$fri['online'];
if($online==1){
$fnum++;
$pnum++;
}
else{
$pnum++;
}
}
}
include('chatterbox/scripts.php'); ?>
<script>
$('textarea').bind("enterKey",function(e){
   cSend();
});
$('textarea').keyup(function(e){
if(e.keyCode == 13)
{
  $(this).trigger("enterKey");
}
});
</script>
</head>
<body>
<div id="chatbar" onclick="chop()">
Chat <?php echo('('.$fnum.'/'.$pnum.')'); ?> </div>
<div id="chw">
<div id="chwtop" class="effect6"  onclick="chop()"> Chat </div>
<div id="chwchatters"><?php include('chatterbox/chat_friends.php'); ?>
</div>
</div>