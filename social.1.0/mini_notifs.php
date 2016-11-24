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
else{
echo('
<script type="text/javascript">
jQuery(function( $ ){
var menuRoot = $( "#notify" );
var menu = $( "#notifs" );
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
!$( event.target ).closest( "#notifs" ).size()
){
menu.hide();
}
}
);
 
});
 </script>');
$num=0;
$sql = mysql_query("SELECT * FROM streams WHERE uid='$uid'" );
while($streams= mysql_fetch_array($sql))
  {
$sid=$streams['id'];
$sql2 = mysql_query("SELECT * FROM notifs WHERE sid='$sid' AND seen='0' ORDER BY  `notifs`.`time` DESC ");
while($notifs= mysql_fetch_array($sql2))
  {
$num++;
}

}
echo('<font size="6"><div id="notify"');
if($num>0){
echo(' class="active">');
echo($num);
}
else{
echo('class="inactive">');
echo('0');

} 
echo('</div></font>
<div id="notifs"><div>');
$num=0;
$sql = mysql_query("SELECT * FROM streams WHERE uid='$uid'" );
while($streams= mysql_fetch_array($sql))
  {
$sid=$streams['id'];
$sql2 = mysql_query("SELECT * FROM notifs WHERE sid='$sid' ORDER BY `notifs`.`time` DESC  LIMIT 0, 30");
while($notifs= mysql_fetch_array($sql2))
  {
$notif=$notifs['notif'];
$ntime=$notifs['time'];
$seen=$notifs['seen'];
echo('<a href="noti?sid='.$sid.'&time='.$ntime.'"><li>'.$notif.' ');
if($seen==1){
echo('<img src="icon/tick.png" class="seen">');
}
echo('</li></a>');
$num++;
}
}
echo('</div></div>');
}
?>