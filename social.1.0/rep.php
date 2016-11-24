<?php
include('config.php');
$cokie=$_COOKIE['iunv_sessid'];
$uid=$_COOKIE['iunv_id'];
$rex=1;
$sql = mysql_query("SELECT * FROM active WHERE id='$uid'");
while($auth= mysql_fetch_array($sql)){
$rex=$auth['cookie'];
}
if(!$rex==$cokie){
Header('Location: log-in');
exit();
}
else{echo('
<script>


function rep()
{
var con=document.bolo.bak.value;
var sid=document.getElementById("xy").innerHTML;

var xmlhttp;
if (con.length==1)
  { 
   document.getElementById("sayings").innerHTML=xmlhttp.responseText;

  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    document.getElementById("sayings").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("POST","reping.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("con="+con+"&sid="+sid);
document.bolo.bak.value=" ";
}

</script>
<div id="conk">');

echo('<form style="display: inline-block;" name="bolo" action="" method="post">
<input type="text" placeholder="What do you think about it?" autofocus="true" name="bak" id="bakc"/>
</form>
<div id="xy" style="display: none;">'.$sid.'</div>
<div onclick="rep();" id="repl"> Comment </div><br><hr>
<div id="sayings">
');

$uname=$_COOKIE['iunv_uname'];
$sql2 = mysql_query("SELECT * FROM comments WHERE sid='$sid'");

while($comments= mysql_fetch_array($sql2))
  {
$cid=$comments['id'];
$comment=$comments['text'];
$name=$comments['name'];
$cname=$comments['username'];
$time=$comments['time'];
$date=date("D F d Y",$time);
echo('<li id="commi">');
echo('<b><a href="profile?p='.$cname.'">'.$name.'</a>: </b>');
echo($comment);
echo('<br>');
echo('<div id="time2" class="faded">'.$date.''); if($uname==$cname){
echo('<a href="comdel?cid='.$cid.'&sid='.$sid.'" class="delll">Delete</a>');}
echo(' </div>');
echo('</li>');
}
echo('
</div>
</div>');
}
?>

 