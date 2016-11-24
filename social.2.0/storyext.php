<?php

include('config.php');

$sid=$_POST['sid'];
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");

while($posts= mysql_fetch_assoc($sql)){

$text=$posts['text'];
$type=$posts['type'];
echo '<li id="post_'.$sid.'">';

story_type($type, $text);
echo '</li>';

}

function story_type($type, $text){
if($type=='1'){
echo 'You said <hr>'.$text;
}
elseif($type=='9'){
echo 'You uploaded a new cover <hr>'.$text;
}
elseif($type=='4'){
echo 'You uploaded a pic <hr>'.$text;
}
elseif($type=='5'){
echo 'You updated your profile picture <hr>'.$text;
}
else{
}
}

?>