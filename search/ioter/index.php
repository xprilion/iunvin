<?php

if(!isset($_GET['u'])){

}
else{
if(strlen(trim($_GET['u']))<3){

}
else{

$urlx = $_GET['u'];

function getTitle($Url){
    $str = file_get_contents($Url);
    if(strlen($str)>0){
        preg_match("/\<title\>(.*)\<\/title\>/",$str,$title);
        return $title[1];
    }
}

echo('<title> ');

echo getTitle($urlx);

echo(' - iOter.iunv </title>');

}

}

?><?php

include('config.php');

include('header.php');

?>
<script type="text/javascript" src="jquery-1.3.2.js"></script>
<script type="text/javascript">
jQuery(function( $ ){
var menuRoot = $( "#ioterSettings" );
var menu = $( "#ioterm" );
menuRoot
.attr( "href", "javascript:void( 0 )" )
.click(
function(){
menu.toggle();
menuRoot.addClass('ioactive');
menuRoot.blur();
return( false );
}
)
;
$( document ).click(
function( event ){
if (
menu.is( ":visible" ) &&
!$( event.target ).closest( "#ioterm" ).size()
){
menuRoot.removeClass('ioactive');
menuRoot.addClass('ioterM');
menu.hide();
}
}
);
});
 </script>

<script>
jQuery(function( $ ){
var menu = $( "#hints" );
$( document ).click(
function( event ){
if (
menu.is( ":visible" ) &&
!$( event.target ).closest( "#hints" ).size()
){
document.getElementById("ioterSearch").style.height="20px";
menu.hide();
}
}
);
});
</script>
<script>

function ioterHide(){
document.getElementById('ioterm').style.display='none';
document.getElementById('ioterSettings').className="ioterM";
}

function hint(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("hints").innerHTML="";
document.getElementById("hints").style.display="none";
document.getElementById("ioterSearch").style.height="20px";
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
document.getElementById("hints").style.display="block";
document.getElementById("ioterSearch").style.height="auto";
    }
  }
xmlhttp.open("GET","keywords.php?s="+str,true);
xmlhttp.send();
}

function putit(key){
document.search.s.value= key ;
document.getElementById("hints").innerHTML="";
document.getElementById("hints").style.display="none";
document.getElementById("ioterSearch").style.height="20px";
}


function got(act){
if(act=="social"){
var url="http://localhost";
window.open(url);
}

if(act=="play"){
var url="http://localhost/play/";
window.open(url);
}


if(act=="market"){
var url="http://market.iunv.in";
window.open(url);
}


if(act=="news"){
var url="http://localhost/ext/ve/";
window.open(url);
}


}
</script>
<script>
$(document).ready(function()
{
var w=window.innerWidth;
var h=window.innerHeight;
wo=w;
ho=h-30;
document.getElementById("ioterScope").style.height= ho+'px';
document.getElementById("ioterScope").style.width= wo+'px';
 });
</script>
</head>
<body>


<?php include('top.php');

if(!isset($_GET['u'])){
echo('No URL Specified!');
}
else{
if(strlen(trim($_GET['u']))<3){
echo('That happens to be too short a URL!');
}
else{

$urlx = $_GET['u'];
echo('<iframe id ="ioterScope" src="'.$urlx.'" onclick="ioterHide">');

}

}

?>

</body>