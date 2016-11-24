<?php
function textit($text3, $sed){
	include('config.php');
$text4= htmlspecialchars_decode($text3, ENT_NOQUOTES);

$text2="xxx ".$text4;
$text=preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $text2);
$sid=$sed;
$tok = strtok($text, " ");
	
	
while ($tok !== false) {
	
$tok = strtok(" ");
$tok2=trim($tok);
$keyword=strtolower($tok);
if(strlen($tok2)>0){
	
	//process start
	//check if exists
$sql1 = "SELECT * FROM keywords WHERE keyword='$keyword'";
$result = mysql_query($sql1) or die('error');
$row = mysql_fetch_assoc($result);

	if(mysql_num_rows($result)){  //if exist
		
$time=$row['times'];
$time2=$time+1;
		$a="UPDATE keywords SET times='$time2' WHERE keyword='$keyword'"; //increase in occurence
		if(!mysql_query($a, $con)){
			echo('error!');
		}
			
			$sql3 = mysql_query("SELECT * FROM key_$keyword WHERE sid='$sid'"); //update the keyword table too
		if(mysql_num_rows($sql3)>0) { //check if it has been counted
				while($row2 = mysql_fetch_assoc($sql3)){ //if yes
$timex=$row2['times']; 
$timex2=$timex+1;
					$b="UPDATE key_$keyword SET times='$timex2' WHERE sid='$sid'"; //increase in occurence
		if(!mysql_query($b, $con)){
			echo('error!');
		}}
		}
				else{
					$c="INSERT INTO key_$keyword(sid, times) VALUES ('$sid', '1')"; //increase in occurence
		if(!mysql_query($c, $con)){
			echo('error!');
		}
				}
}

else{
mysql_query("INSERT INTO keywords(keyword) VALUES ('$keyword')");

mysql_query("CREATE TABLE key_$keyword(
id INT (99) NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
sid VARCHAR(500), 
times VARCHAR(500))");
mysql_query("INSERT INTO key_$keyword(sid, times) VALUES ('$sid', '1')");
}
}
}
}
?>