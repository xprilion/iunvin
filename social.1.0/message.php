<?php if(isset($_COOKIE['iunv_uname'])){
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
else{
echo('<!DOCTYPE html>
<html>
<head> <title> Message - iunv.social </title>
<script src="nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
     bkLib.onDomLoaded(function() {
     var myNicEditor = new nicEditor();
     myNicEditor.setPanel("mtools");
     myNicEditor.addInstance("mmsg");
     });
</script>
<script>

function msend()
{
var sname=document.message.to.value;
var msubject=document.message.subject.value;
var mmsg=nicEditors.findEditor("mmsg").getContent();
var xmlhttp;
if (sname.length==" ")
  { 
   document.getElementById("mres").innerHTML=xmlhttp.responseText;

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
    document.getElementById("mres").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("GET", "msend.php?sname="+sname+"&subject="+msubject+"&text="+mmsg ,true);
xmlhttp.send();
}

function msave()
{
var sname=document.message.to.value;
var msubject=document.message.subject.value;
var mmsg=nicEditors.findEditor("mmsg").getContent();
var xmlhttp;
if (sname.length==" ")
  { 
   document.getElementById("mres").innerHTML=xmlhttp.responseText;

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
    document.getElementById("mres").innerHTML=xmlhttp.responseText;
  }
xmlhttp.open("GET", "msave.php?sname="+sname+"&subject="+msubject+"&text="+mmsg ,true);
xmlhttp.send();
}

</script>');
include('header.php');
echo('<script type="text/javascript">
$(document).ready(function(){
$("#wall").niceScroll();
$("#mmsg").niceScroll();
$("#notifs").niceScroll();
});
</script><div id="wall" onclick="document.getElementById');
echo("('menu').style.display='none';");
echo('">
<div id="mframe">
<div id="mres"><form name="message">
<div id="mtools"></div><hr>
<div id="mto">To: <input id="mtoo" name="to" placeholder="username of your friend" value="');
if(isset($_GET['to'])){ echo $_GET['to']; }
echo('" ></div>
<div id="msubject">Subject: <input id="mtoo" name="subject" placeholder="A short intro to your message"></div>
<textarea id="mmsg" style="outline: none;" name="mtext"></textarea>
</form>
<div id="msend" class="mbutton" onclick="msend();" >Send</div><div id="msave" class="mbutton" onclick="msave();" >Save as draft</div></div><a href="messages.php"><div id="mhome" class="mbutton">Home</div></a>
</div>
</div>
<div id="holder">');
include('sidebar.php');

echo('</div>
</div>
<div id="footer">');
include('footer.php');
echo('</div>
</body>
</html>');
}
}
?>