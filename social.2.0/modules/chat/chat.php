<div id="chatBarIn">
<div id="chatStatus" class="right Off" onclick="chat_on();"></div>
	<div id="chatBarRoot" class="cOff" onclick="dockChat();">
		Chat <div id="chatBarRootNumOnline"><img src="loading.gif" height="10px"></div>
	</div>
</div>
<div id="chatBarOut">
	<div id="chatPeople"></div>
</div>
<?php
if(isset($_COOKIE['iunv_chat'])){
$chat=$_COOKIE['iunv_chat'];
if($chat=='1'){
echo("<script> window.setTimeout(function(){chat_on();}, 100);
</script>");
}
}
?>
