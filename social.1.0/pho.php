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
echo('<html>
  <head>
    <style media="screen" type="text/css">
      .layer1_class { position: absolute; z-index: 1; top: 50px; left: 50px; visibility: visible; }
      .layer2_class { position: absolute; z-index: 2; top: 0px; left: 20px; visibility: hidden; }

#capx{
height: auto;
width: 220px;
background: rgba(0, 0, 0, 0.41);
padding-top: 5px;
padding-bottom: 5px;
padding-left: 5px;
padding-right: 5px;
color: #fff;
position: relative;
left: -230px;
top: -10px;
display: inline-block;
-webkit-transition: background 1s;
font-weight: bold;
}
#capxe{
height: auto;
width:220px;
background: transparent;
padding-top: 5px;
padding-bottom: 5px;
padding-left: 5px;
padding-right: 5px;
display: inline-block;
color: transparent;
position: relative;
left: -230px;
top: -10px
}

#capx:hover{
background: #000;
color: #12deff;
}
#inf{

display: inline-block;
position: relative;
top: -150px;
margin-left: 20px;
border: 2px solid #12deff;
padding: 0.5em;
width: 150px;
}
    </style>
    <script>
      function downLoad(){
        if (document.all){
            document.all["layer1"].style.visibility="hidden";
            document.all["layer2"].style.visibility="visible";
        } else if (document.getElementById){
            node = document.getElementById("layer1").style.visibility="hidden";
            node = document.getElementById("layer2").style.visibility="visible";
        }
      }
    </script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script> 
<script src="js/jquery.nicescroll.min.js"></script> 
<script> 
  $(document).ready(function() {    
	$("#contix").niceScroll();
  });
</script>
  </head>
  <body onload="downLoad()">
    <div id="layer1" class="layer1_class">
      <table width="100%">
        <tr>
          <td align="center"><img height="50px" src="loading.gif"></p></td>
        </tr>
      </table>
    </div>
    <div id="layer2" class="layer2_class">
<div id="contix" style="height: 320px; display: block;">');
$p=$_GET['p'];

$sql2 = mysql_query("SELECT * FROM account WHERE username='$p'");
while($user= mysql_fetch_array($sql2))
  {
$uid=$user['id'];
$sql=mysql_query("SELECT * FROM uploads WHERE uid='$uid'");
while($pics= mysql_fetch_array($sql))
  {
$pij=$pics['url'];
$cap=$pics['caption'];
$sid=$pics['sid'];
echo('<a href="story?sid='.$sid.'" target="blank"><img src="uploads/images/'.$p.'/show/'.$pij.'" style="max-height: 270px; max-width: 270px; display: inline-block;">');
if(strlen($cap)>0){
echo('<div id="capx">'.$cap.'</div></a>');
}
else{
echo('<div id="capxe"> photo </div></a>');
}
}
}
echo('</div>
</div>
</body>
</html>');
}
?>