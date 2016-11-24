function hint(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("hints").innerHTML="";
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
    document.getElementById("hints").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","keywords.php?s="+str,true);
xmlhttp.send();
}

function putit(key){
document.search.s.value= key ;
document.getElementById("hints").innerHTML="";
}

setInterval(function(){stst()},5000);

function stst(){
str="holla";
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("sttt").innerHTML="";
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
    document.getElementById("sttt").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","stats.php?s="+str,true);
xmlhttp.send();

}

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

function toims(){
var key= document.search.s.value;
document.search.action='images';
document.getElementById('l2').className="active";
document.getElementById('l1').className="slli";

document.getElementById('abcdef').innerHTML='<div id="ifbut" onclick="imsearchit()"><center><img src="search.ico" align="center"></center></div>';
if(key.length>0){imsearchit(key);}
else{
window.history.pushState(key,"images@iunv.find", "/find/images");
document.title ="images@iunv.find";
}

}

function toweb(){
document.getElementById('l1').className="active";
document.getElementById('l2').className="slli";
var key= document.search.s.value;
document.search.action="";
document.getElementById("abcdef").innerHTML="<div id='ifbut' onclick='searchit()'><center><img src='search.ico' align='center'></center></div>";
if(key.length>0){searchit(key);}
else{
window.history.pushState(key,"iunv.find", "/find/");
document.title ="iunv.find";
}


}

function searchit()
{
var key= document.search.s.value;
document.getElementById("content").innerHTML="<center><img src='loading.gif' height='20px'></center>";
window.history.pushState(key, key+" - iunv.find", "/find/?s="+key);
document.title = key+" - iunv.find";
var xmlhttp;
if (key.length==" ")
  { 
  document.getElementById("content").innerHTML="Search Something!";
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
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?s="+key,true);
xmlhttp.send();
}

function imsearchit()
{
var key= document.search.s.value;
document.getElementById("content").innerHTML="<center><img src='loading.gif' height='20px'></center>";
window.history.pushState(key, key+" - images@iunv.find", "/find/images?s="+key);
document.title = key+" - images@iunv.find";
var xmlhttp;
if (key.length==" ")
  { 
  document.getElementById("content").innerHTML="Search Something!";
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
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","img_search.php?s="+key,true);
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
