<?php

include('../../config.php');
$sid=$_POST['sid'];
$uid=$_COOKIE['iunv_id'];
$sh=mysql_query("SELECT * FROM story_photos WHERE sid='$sid'");
while($so=mysql_fetch_assoc($sh)){
$cap=$so['caption'];
$ct=trim($cap);
$img=$so['img'];
echo('<img class="midpics lazy" onclick=photoview("uploads/images/'.$uid.'/'.$img.'") src="uploads/images/'.$uid.'/'.$img.'" />');
if(strlen($ct)>0){
echo('<br><div class="dcap">'.$cap.'</div>');
}
}
		$l = mysql_query("SELECT * FROM story_likes WHERE sid='$sid'");
		$likes=mysql_num_rows($l);
		$c= mysql_query("SELECT * FROM story_comments WHERE sid='$sid'");
		$comments=mysql_num_rows($c);
		echo '<li class="streamsli">';
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

?>