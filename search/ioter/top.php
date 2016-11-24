<div id="ioterBar">
<div id="ioterSettings" class="ioterM" onclick="iotermToggle()" title="Customize your iOter settings!">
<img src="settings.png" height="30px">
</div>
<div id="ioterMem" class="ioterM">
<div id="loginB" class="ioterMemB"> Login </div>
<div id="joinB" class="ioterMemB"> Join </div>
</div>
<hr>
<?php
include('config.php');
$url=$_GET['u'];
$url=parse_url($url, PHP_URL_HOST);
$url = preg_replace("(https?://)", "", $url);
$sql = mysql_query("SELECT * FROM pages WHERE url = '$url'");
if(mysql_num_rows($sql)){
$sql = mysql_query("SELECT * FROM pages WHERE url = '$url'");
while($ki= mysql_fetch_array($sql))
  {
$times=$ki['viewed'];
}
}

else{
$times="Unknown!";
}

echo('<div id="ioterViews" class="ioterM" title="'.$times.' People saw this page through our search!">');
echo($times);
?>
</div>
<div id="ioterSearch" class="ioterM">
<form action="http://localhost/find/" method="get" autocomplete="off" name="search">
<input type="submit" id="ifbut" value="iunv.find" />
<input type="text" name="s" id="ifbar" onkeyup="hint(this.value)" <?php

if(isset($_GET['s'])){
$s=$_GET['s'];
echo('value="'.$s.'"');
}

?>

autofocus >
</form>
<div id="hints"> </div>
</div>
<div id="logo">
<font size="5"><a href="./">iunv</a></font>
<div id="lmenu">
<li onclick="got('social')">Social</li>
<li onclick="got('play')">Play</li>
<li onclick="got('market')"> Market </li>
<li onclick="got('news')"> News </li>
</div>
</div>
</div>
<div id="ioterm">
<li> Hi </li>
<li> hi </li>
<li> hhi </li>
<hr>
<li> ioio </li>
</div>