<?php

function story($sid){
include('../../config.php');
$uid=$_COOKIE['iunv_id'];
	$sql = mysql_query("SELECT * FROM stories WHERE id='$sid'");
$nummm=mysql_num_rows($sql);
if($nummm==1){
mysql_query("UPDATE user_notifs SET seen='1' WHERE uid='$uid' AND sid='$sid'");
	while($posts= mysql_fetch_assoc($sql)){
		$oid=$posts['uid'];
		$type=$posts['type'];
		$l = mysql_query("SELECT * FROM story_likes WHERE sid='$sid'");
		$likes=mysql_num_rows($l);
		$c= mysql_query("SELECT * FROM story_comments WHERE sid='$sid'");
		$comments=mysql_num_rows($c);
		if($type=='1'){
			$sql = mysql_query("SELECT * FROM story_texts WHERE sid='$sid'");
			while($postsi= mysql_fetch_assoc($sql)){
				$text=$postsi['text'];
				$img=' ';
			}
		}
		if($type=='2'){
			$sql = mysql_query("SELECT * FROM story_photos WHERE sid='$sid'");
			while($postsi= mysql_fetch_assoc($sql)){
				$img=$postsi['img'];
				$text=$postsi['caption'];
			}
		}
		echo '<li class="streamsli">';
		story_typeo($type, $text, $img, $oid, $sid);
		echo('<div class="storyinfo"> <div title="Comment" class="comments" onclick=comment("'.$sid.'")>
		<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
		 <g>
			  <title>Comment</title>
		  <g id="svg_17">
 				  <g id="svg_8">
				    <rect ry="29" rx="29" id="svg_6" height="15.33945" width="20" y="0.5" x="0.5" stroke-linecap="null" stroke-linejoin="null" stroke-dasharray="null" stroke-width="0" stroke="#000000" fill="#000000"/>
				    <path id="svg_7" d="m16.00387,19.5l-7.67442,-5.61045l6.89131,-0.229l0.78311,5.83945z" stroke-linecap="null" stroke-linejoin="null" stroke-dasharray="null" stroke-width="0" stroke="#000000" fill="#000000"/>
	  		 	</g>
		 		  <rect id="svg_14" height="2.54011" width="11.9368" y="3.34492" x="4.04411" stroke-linecap="null" stroke-linejoin="null" stroke-dasharray="null" stroke-width="null" stroke="#000000" fill="#ffffff"/>
		 		  <rect id="svg_15" height="2.54011" width="13.69786" y="6.68835" x="4.04411" stroke-linecap="null" stroke-linejoin="null" stroke-dasharray="null" stroke-width="null" stroke="#000000" fill="#ffffff"/>
		 		  <rect id="svg_16" height="2.54011" width="7.58453" y="10.03179" x="4.04412" stroke-linecap="null" stroke-linejoin="null" stroke-dasharray="null" stroke-width="null" stroke="#000000" fill="#ffffff"/>
			  </g>
		 </g>
		</svg>'.$comments.'</div>
		<div class="likes">
			<div style="display: inline;" onclick=like("'.$sid.'")>
			<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
				 <g>
 					 <title>Worth It!</title>
 					 <rect opacity="0.25" id="svg_5" height="19" width="19" y="0.5" x="0.5" stroke-linecap="null" stroke-linejoin="null" stroke-dasharray="null" stroke-width="0" stroke="#000000" fill="#007fff"/>
 				</g>
				 <g>
					  <g id="svg_4">
 						  <rect transform="matrix(-0.000620448, 0.0520929, -0.0660769, -0.000489141, 111.921, 108.83)" id="svg_2" ry="5" rx="5" height="169.99995" width="37" y="1475.15913" x="-1903.34653" stroke-width="5" stroke="#000000" fill="#000000"/>
 						  <rect id="svg_3" transform="matrix(-0.0517345, -0.000822826, 0.000737095, -0.0665287, 57.3996, 111.748)" ry="5" rx="5" height="170" width="37" y="1435.46567" x="918.26932" stroke-width="5" stroke="#000000" fill="#000000"/>
 					 </g>
 				</g>
			</svg></div>  <div style="display: inline;" id="dlikes'.$sid.'">'.$likes.'</div></div>');
			echo('<div class="cnd" id="cnd'.$sid.'"><div id="comments'.$sid.'" class="commm"></div>
			<div title="Comment!" class="typeinactive postDo comSubmit" onclick=doComment("'.$sid.'")> <img src="img/post2.png"></div>
			<form name="comments'.$sid.'" class="commi" action=" " method=" ">
			<textarea class="textInput comm" id="cd'.$sid.'" placeholder="What you feel about this post..."></textarea>
			</form>
			</div>');
			echo '</div></li>';
	}
}
else{
echo('<script>window.location.replace("./#storyMissing");</script>');
}
}

function story_typeo($type, $text, $img, $oid, $sid){
include('../../config.php');
$rid=$_COOKIE['iunv_id'];
$sql = mysql_query("SELECT * FROM account WHERE id='$oid'");
$s= mysql_fetch_assoc($sql);
$uid=$oid;
$uname=$s['username'];
$upic=$s['propic'];
$upicth='img/thumb_default.png';
$upicbg='img/big_default.png';
if($upic!='default'){
$upicth='uploads/images/'.$uid.'/thumbnails/'.$upic;
$upicbg='uploads/images/'.$uid.'/'.$upic;
}
$name=$s['name'];
$len=strlen($text);
echo('<table class="streamtb strTB">');
if($uid==$rid){
echo('<div class="strD delD" title="Delete this post" onclick=story("'.$sid.'")>&#10006;</div>');
}
else{
echo('<div class="strD repD" title="Report this post" onclick=story("'.$sid.'")>!</div>');
}
echo('<tr><td class="imtd"><a href="'.$uname.'" title="'.$name.'" onclick=navto("'.$uname.'")><img class="lazy proThumb" src="'.$upicth.'"></a></td><td><table class="streamtb"><tr><td><a href="'.$uname.'" class="portsa" title="'.$name.'" onclick=navto("'.$uname.'")>'.$name.'</a></td></tr><tr><td>');
if($len<200){
if($type=='1'){
echo '<div class="dstory"> '.$text.'</div>';
}
elseif($type=='2'){
echo '<div class="dstory"> '.$text.'<br><br><img class="lazy streamsim" src="uploads/images/'.$uid.'/thumbnails/'.$img.'" onclick=photoview("uploads/images/'.$uid.'/'.$img.'")></div></td></tr></table></td></tr></table>';
}
}
else{
$tp1=substr($text, 0, 199);
$tp2=substr($text, 199);
$ty=$sid;
if($type=='1'){
echo '<div class="dstory"> '.$tp1.'<div id="sm'.$ty.'" class="seeMore" onclick=seeMore("'.$ty.'")>...See More</div><div id="smt'.$ty.'" class="seeMoreText">'.$tp2.'</div></div>';
}
elseif($type=='2'){
echo '<div class="dstory"> '.$tp1.'<div id="sm'.$ty.'" class="seeMore" onclick=seeMore("'.$ty.'")>...See More</div><div id="smt'.$ty.'" class="seeMoreText">'.$tp2.'</div><br><br><img class="lazy streamsim" src="uploads/images/'.$uid.'/thumbnails/'.$img.'" onclick=photoview("uploads/images/'.$uid.'/'.$img.'")></div>';
}
}
echo('</td></tr></table></td></tr></table>');
}

?>