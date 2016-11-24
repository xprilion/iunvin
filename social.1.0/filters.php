<?php

function country(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$country2=$_GET['country'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE country LIKE '$country2' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}


function age(){
include('config.php');

$uid=$_COOKIE['iunv_id'];

$age2=$_GET['age'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE birthyear LIKE '%$age2%' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}


function name(){
include('config.php');

$uid=$_COOKIE['iunv_id'];

$name2=$_GET['name'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE fullname LIKE '%$name2%' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}

function sex(){
include('config.php');

$uid=$_COOKIE['iunv_id'];

$sex2=$_GET['sex'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE gender LIKE '$sex2' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}


function country_age(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$age2=$_GET['age'];
$country2=$_GET['country'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE country LIKE '$country2' AND birthyear LIKE '%$age2%' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}


function country_age_name(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$name2=$_GET['name'];
$age2=$_GET['age'];
$country2=$_GET['country'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE country LIKE '$country2' AND birthyear LIKE '%$age2%' AND fullname LIKE '%$name2%' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}


function country_age_name_sex(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$sex2=$_GET['sex'];
$name2=$_GET['name'];
$age2=$_GET['age'];
$country2=$_GET['country'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE country LIKE '$country2' AND birthyear LIKE '%$age2%' AND fullname LIKE '%$name2%' AND gender='$sex2' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}


function age_name(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$name2=$_GET['name'];
$age2=$_GET['age'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE birthyear LIKE '%$age2%' AND fullname LIKE '%$name2%' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}




function age_name_sex(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$sex2=$_GET['sex'];
$name2=$_GET['name'];
$age2=$_GET['age'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE birthyear LIKE '%$age2%' AND fullname LIKE '%$name2%' AND gender='$sex2' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}


function name_sex(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$sex2=$_GET['sex'];
$name2=$_GET['name'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE fullname LIKE '%$name2%' AND gender='$sex2' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}




function country_name(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$name2=$_GET['name'];
$country2=$_GET['country'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE country LIKE '$country2' AND fullname LIKE '%$name2%' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}



function age_sex(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$sex2=$_GET['sex'];
$age2=$_GET['age'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE birthyear LIKE '%$age2%' AND gender='$sex2' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}


function country_sex(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$sex2=$_GET['sex'];
$country2=$_GET['country'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE country LIKE '$country2' AND gender='$sex2' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}



function country_name_sex(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$sex2=$_GET['sex'];
$name2=$_GET['name'];
$country2=$_GET['country'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE country LIKE '$country2' AND fullname LIKE '%$name2%' AND gender='$sex2' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}


function country_age_sex(){
include('config.php');

$uid=$_COOKIE['iunv_id'];
$sex2=$_GET['sex'];
$age2=$_GET['age'];
$country2=$_GET['country'];
$sqlx = mysql_query("SELECT * FROM `account` WHERE country LIKE '$country2' AND birthyear LIKE '%$age2%' AND gender='$sex2' LIMIT 0, 30");

while($user= mysql_fetch_array($sqlx)){
$b=$user['id'];
oper($b);
}
}

?>