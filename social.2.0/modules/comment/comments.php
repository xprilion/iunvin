<hr><?php
include('../../config.php');
$sid=$_POST['sid'];
$sql=mysql_query("SELECT * FROM story_comments WHERE sid='$sid' ORDER BY time LIMIT 0, 10");
while($c=mysql_fetch_assoc($sql)){
$text=$c['text'];
$len=strlen($text);
$time=$c['time'];
if($len<50){
echo('<style>.wxx'.$time.'{
width: 100%;
}</style>');
}
else if(($len>49) && ($len<70)){
echo('<style>.wxx'.$time.'{
width: 61%;
}</style>');
}
else if(($len>69) && ($len<150)){
echo('<style>.wxx'.$time.'{
width: 31%;
}</style>');
}
else if(($len>149) && ($len<300)){
echo('<style>.wxx'.$time.'{
width: 13.5%;
}</style>');
}
else if(($len>299) && ($len<300)){
echo('<style>.wxx'.$time.'{
width: 61%;
}</style>');
}
elseif($len>299){
echo('<style>.wxx'.$time.'{
width: 9%;
}</style>');
}
$uid=$c['uid'];
$time=$c['time'];
$userd=mysql_query("SELECT * FROM account WHERE id='$uid'");
$user=mysql_fetch_assoc($userd);
$name=$user['name'];
$uname=$user['username'];
$upic=$user['propic'];
$upicth='img/thumb_default.png';
$upicbg='img/big_default.png';
if($upic!='default'){
$upicth='uploads/images/'.$uid.'/thumbnails/'.$upic;
$upicbg='uploads/images/'.$uid.'/'.$upic;
}
echo('<div class="whiteDiv">');
echo '<table class="lisoc" style="width: 100%;">
	<tbody  class="lisoc" style="width: 100%;">
	<tr class="lisoc" style="width: 100%; display: inline-table;">
		<td style="width: 13%;" class="vertd">
			<a href="'.$uname.'" title="'.$name.'">
				<img class="lazy proThumb" src="'.$upicth.'">
			</a>
		</td>
		<td style="width: 100%; display: inline-block;">
			<table class="lisoc" style="width: 100%;">
				<tbody  class="lisoc" style="width: 100%;">
				<tr class="lisoc" style="width: 100%;">
					<td class="lisoc" style="width: 90%;">
						<a href="'.$uname.'" class="portsa" title="'.$name.'">'.$name.'</a>
					</td>
				</tr>
				<tr class="lisoc" style="width: 100%;">
					<td class="lisoc wxx'.$time.'">
						<div> '.$text.'</div>
					</td>
				</tr>
				</tbody>
			</table>
		</td>
	</tr>
	</tbody>
</table>';
echo('</div>');
}

?>