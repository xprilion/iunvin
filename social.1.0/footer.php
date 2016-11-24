&copy; iunv 2013<a href="feedback"><div id="feedback"> Feedback </div></a><a href="help"><div id="help"> ? </div></a>


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
}
else{
if(!isset($_COOKIE['iunv_name'])){ } else{
include('chatterbox/index.php');
echo('
<div style="position: fixed; top: 5px; right: 300px; z-index: 999999999999999999999999999999999999999999;"> '); include('mini_notifs.php'); echo('</div>
<div style="position: fixed; top: 10px; right: 370px;z-index: 999999999999999999999999999999999999999999; ">'); include('msgs.php'); echo('</div>');
}
}
}
?>

<script>

jQuery(function ( $ ){
var menuRoot = $( "#root" );
var menu = $( "#menux" );
menuRoot.attr( "href", "javascript:void( 0 )" ).click(function(){
menu.toggle(); 
menuRoot.blur(); 
return( false );
}
);
}
);
</script>
<script type="text/javascript">
jQuery(function( $ ){
var menuRoot = $( "#root2" );
var menu = $( "#menu2" );
menuRoot
.attr( "href", "javascript:void( 0 )" )
.click(
function(){
menu.toggle();
menuRoot.blur();
return( false );
}
)
;
$( document ).click(
function( event ){
if (
menu.is( ":visible" ) &&
!$( event.target ).closest( "#menu2" ).size()
){
menu.hide();
}
}
);
 
});
</script> 