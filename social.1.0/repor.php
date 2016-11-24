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

$sid=$_POST['sid'];
$reason=$_POST['rea'];
switch($reason){
case 10: porno(); break;
case 20: abuse(); break;
case 30: lang(); break;
case 40: child(); break;
case 50: threat(); break;
case 21: abuseme(); break;
case 22: abuseanim(); break;
case 23: abusegrp(); break;
case 25: abusefrnd(); break;
case 27: abusearea(); break;
}

}

function porno(){
include('config.php');
$sid=$_POST['sid'];
$reason=$_POST['rea'];
$uid=$_COOKIE['iunv_id'];
$type=10;
$time=time();
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");
while($streams= mysql_fetch_array($sql))
  {
$aid=$streams['uid'];

$sql2="INSERT INTO reports(uid, sid, aid, time, type)
VALUES
('$uid','$sid','$aid','$time', $type)";
if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
}
echo('Reported!');
}
function abuse(){
echo('
Who is this post abusing?<hr><br>
<form name="report" method="post" action="report.php">

<input type="radio" name="reason" value="21" onclick="reporting(this.value)"> Me <br>
<input type="radio" name="reason" value="25" onclick="reporting(this.value)"> A friend <br>
<input type="radio" name="reason" value="23" onclick="reporting(this.value)"> A group of people <br>
<input type="radio" name="reason" value="27" onclick="reporting(this.value)"> A country, state or religion  <br>
<input type="radio" name="reason" value="22" onclick="reporting(this.value)"> Animals <br>
</form>');
}
function lang(){
include('config.php');
$sid=$_POST['sid'];
$reason=$_POST['rea'];
$uid=$_COOKIE['iunv_id'];
$type=30;
$time=time();
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");
while($streams= mysql_fetch_array($sql))
  {
$aid=$streams['uid'];
$sql2="INSERT INTO reports(uid, sid, aid, time, type)
VALUES
('$uid','$sid','$aid','$time', $type)";

if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
}
echo('Reported!');

}

function child(){
include('config.php');
$sid=$_POST['sid'];
$reason=$_POST['rea'];
$uid=$_COOKIE['iunv_id'];
$type=40;
$time=time();
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");
while($streams= mysql_fetch_array($sql))
  {
$aid=$streams['uid'];
$sql2="INSERT INTO reports(uid, sid, aid, time, type)
VALUES
('$uid','$sid','$aid','$time', $type)";

if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
}
echo('Reported!');
}
function threat(){
echo('How is this post threatening your privacy?<hr><br>
<form name="report" method="post" action="reporo.php">

<input type="text" name="reasonx" id="fbin">
<div onclick="reporto()" style="
background: #fcfcfc;
height: 20px;
width: 100px;
padding:4px;
text-align: center;
box-shadow: 0px 1px 3px 0px #9f9f9f;
"> Done </div>
<div style="display: none;"  id="tt">50</div>
</form>');
}
function abuseme(){
include('config.php');
$sid=$_POST['sid'];
$reason=$_POST['rea'];
$uid=$_COOKIE['iunv_id'];
$type=21;
$time=time();
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");
while($streams= mysql_fetch_array($sql))
  {
$aid=$streams['uid'];

$sql2="INSERT INTO reports(uid, sid, aid, time, type)
VALUES
('$uid','$sid','$aid','$time', $type)";

if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
}
echo('Reported!');
}
function abuseanim(){

include('config.php');
$sid=$_POST['sid'];
$reason=$_POST['rea'];
$uid=$_COOKIE['iunv_id'];
$type=22;
$time=time();
$sql = mysql_query("SELECT * FROM streams WHERE id='$sid'");
while($streams= mysql_fetch_array($sql))
  {
$aid=$streams['uid'];
$sql2="INSERT INTO reports(uid, sid, aid, time, type)
VALUES
('$uid','$sid','$aid','$time', $type)";
if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
}
echo('Reported!');
}
function abusegrp(){
echo('Which group is this post abusing?<hr><br>
<form name="report" method="post" action="reporo.php">

<input type="text" name="reasonx" id="fbin">
<div onclick="reporto()" style="
background: #fcfcfc;
height: 20px;
width: 100px;
padding:4px;text-align: center;
box-shadow: 0px 1px 3px 0px #9f9f9f;
"> Done </div>
<div style="display: none;" id="tt">23</div>
</form>');
}
function abusefrnd(){
echo('Which friend is this post abusing?<hr><br>
<form name="report" method="post" action="reporo.php">

<input type="text" name="reasonx" id="fbin">
<div onclick="reporto()" style="
background: #fcfcfc;
height: 20px;
width: 100px;
padding:4px;text-align: center;
box-shadow: 0px 1px 3px 0px #9f9f9f;
"> Done </div>
<div style="display: none;"  id="tt">25</div>
</form>');
}
function abusearea(){
echo('Which country/state/religion in this post abusing?<hr><br>
<form name="report" method="post" action="reporo.php">

<input type="text" name="reasonx" id="fbin">
<div onclick="reporto()" style="
background: #fcfcfc;
height: 20px;
width: 100px;
padding:4px;text-align: center;
box-shadow: 0px 1px 3px 0px #9f9f9f;
"> Done </div>
<div style="display: none;" id="tt">27</div>
</form>');
}
?>