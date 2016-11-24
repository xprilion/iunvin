
<script>

function olyki()
{
var kee=document.searn.s.value;

var xmlhttp;

if (kee.length==0)
  { 
   document.getElementById("resulta").innerHTML=xmlhttp.responseText;

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

    document.getElementById("resulta").innerHTML=xmlhttp.responseText;
    
  }
xmlhttp.open("POST","people.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("s="+kee);
}

</script>

<form name="searn" autocomplete="off" action="search" method="get">
<INPUT TYPE="text" NAME="s" onkeyup="olyki();" id="se">
<INPUT TYPE="submit" style="display: none;">
</form>

