setInterval(function(){cReciv()},1000);

function cSend()
{
var prev = document.getElementById("cMsgs").innerHTML;

var texts = document.getElementById("cText").value;
var text2= texts.trim();
var len= text2.length;

if(len>0){

sendit();
$("#cMsgs").animate({ scrollTop: $('#cMsgs')[0].scrollHeight}, 1000);
}
}

function sendit(){
var texts = document.getElementById("cText").value;
var gid = document.getElementById("gid").innerHTML;
var cid = document.getElementById("cid").innerHTML;

var xmlhttp;
if (texts.length==0)
  { 
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
var status=xmlhttp.responseText;
if(status=="0"){
document.getElementById("cErr").style.display="block";
document.getElementById("cErr").innerHTML="Message was not sent!";
}
else{
$('#cMsgs')
.append('<li class="me">'+status+'</li>');
}

  }
xmlhttp.open("POST","chatterbox/send.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("text="+texts+"&voila="+gid+"&gil="+cid);
document.getElementById("cText").value="";
}


//////////////

recieve

/////////////

function cReciv()
{

if($("#chat").length >0) {
var pmsg = document.getElementById("cMsgs").innerHTML;
var cid = document.getElementById("cid").innerHTML;
getit(pmsg);
}

}

function getit(pmsg){
var cid=document.getElementById("cid").innerHTML;
var xmlhttp;
var str="hello";

if (str.length==0)
  { 
   document.getElementById("cMsgs").innerHTML=xmlhttp.responseText;

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
var news=xmlhttp.responseText;
var tnews=news.trim();
var lem=tnews.length;
if(lem>0){
document.getElementById("cMsgs").innerHTML= pmsg+news;
$("#cMsgs").animate({ scrollTop: $('#cMsgs')[0].scrollHeight}, 1000);
}
  }
xmlhttp.open("POST","chatterbox/new_message.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("gil="+cid);
}


///////////////

first_recieve

///////////////

function fRec(cid)
{
 $.ajax({
 type: "GET",
 url: "chatterbox/first_recieve.php",
 data: {gil:cid}
 }).done(function( result ) {

 document.getElementById('cMsgsp').innerHTML="";
 $("#cMsgsp").append(result);
 });
}

///////////////

resize

//////////////



function immi()
{
var w=window.innerWidth;
var h=window.innerHeight;
minu = (55/100)*h-(11/100)*h;
ho=minu;
document.getElementById("cMsgs").style.height= ho+'px';
$("#cMsgs").animate({ scrollTop: $('#cMsgs')[0].scrollHeight}, 1000);
}

//////////////

chatbar

/////////////

function chop(){
$("#chw").slideToggle(125);
}

function startchat(fid,cid,fname){
$('#chat').remove();
$('#bluk').remove();

var n = $("#chat").length;
if(n==0){
var pv='<center><img src="loading.gif" align="center" alt="Fetching previous conversation..."></center>';
var nd='<div id="chat"><div id="gid">'+fid+'</div><div id="cid">'+cid+'</div><div class="topyc" onclick="chat_box()" ><div id="ctopy" class="effect6"><font size="4">'+fname+'</font><div id="closi" onclick="close_box()"><center>X</center></div></div></div><div id="restc"><div id="cMsgs"><div id="cMsgsp"></div></div><div id="inBox"><div id="cSend" onclick="cSend()">Send</div><form name="chatbar" action="" method="post"><textarea name="chattext" id="cText" ></textarea></form></div><div id="cErr"></div></div></div><div id="bluk" onclick="chat_box()"> <font size="4">'+fname+'</font> <div id="closi" onclick="close_box()"><center>X</center></div></div>';
$('body').append(nd);
$('#cMsgsp').append(pv);
immi();
}
fRec(cid);
}

/////////////

chatbox

////////////

function chat_box(){
$('#restc').fadeToggle();
$('#chat').slideToggle();
$('#bluk').slideToggle();
}

function close_box(){
$('#bluk').remove();
$('#chat').slideToggle().remove();
}

////////////

chatoff

////////////

window.onbeforeunload = function() {
        chat_off();
    };

    $(document).ready(function() {
        $('a[rel!=ext]').click(function() { window.onbeforeunload = null; });
        $('form').submit(function() { window.onbeforeunload = null; });
    });

function chat_off(){
 $.ajax({
 type: "POST",
 url: "chatterbox/chat_off.php",
 data: {anu:"bhav"}
 });
}

//////////