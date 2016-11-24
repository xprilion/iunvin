function alex(did,url)
{
document.getElementById("info"+did).style.display="none";
document.getElementById("alexa"+did).style.display="inline-block";
document.getElementById("alexa"+did).innerHTML="<img src='loading.gif' height='20px'>";
var xmlhttp;
if (did.length==" ")
  { 
  document.getElementById("alexa"+did).innerHTML="";
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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("alexa"+did).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","alexa.php?url="+url,true);
xmlhttp.send();
}

function immi(x,p,ims)
{
y=x+p;
iw=document.images[y].width;
ih=document.images[y].height;
document.getElementById("prev").style.display="block";
var dh = document.getElementById('prev').offsetHeight;
var dw = document.getElementById('prev').offsetWidth;
ho=(dh/2)-(ih/2)-20-30;
vo=(dw/2)-(iw/2)-20;

document.getElementById("previ").style.marginTop= ho+'px';
document.getElementById("previ").style.marginLeft= vo+'px';
document.getElementById("previ").innerHTML='<div id="load"><img src="loading.gif"></div>';
var xmlhttp;
if (ims.length==" ")
  { 
  document.getElementById("previ").innerHTML="";
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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("previ").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","view_img.php?img="+ims,true);
xmlhttp.send();

dimo(iw,ih);
}

function closi(){
document.getElementById("prev").style.display="none";
document.getElementById("previ").innerHTML='<div id="load"><img src="loading.gif"></div>';
}

function menu(){
var sts=document.getElementById("tmenu").style.display;

if(sts=='block'){
hmenu();
}
else{
smenu();
}

}

function smenu(){
document.getElementById("tmenu").style.display="block";
document.getElementById("tmenur").style.background="#1266ff";
}

function hmenu(){
document.getElementById("tmenu").style.display="none";
document.getElementById("tmenur").style.background="#3c3c3c";
}
