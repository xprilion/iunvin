 <?php

error_reporting (0);
$text1="onFocus=";

$text2="this.value=''";

$text=$text1.$text2;

 if(isset($_GET['s']) && strlen($_GET['s'])>0){

$term=$_GET['s'];

echo('
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>');

echo('
    <title>'.$term.' - iunv.search</title>
    <script src="http://www.google.com/jsapi?key=AIzaSyA5m1Nc8ws2BbmPRwKu5gFradvD_hgq6G0" type="text/javascript"></script>
    <script type="text/javascript">');

echo("
    
    google.load('search', '1');
    
    function OnLoad() {
    
      var searchControl = new google.search.SearchControl();
    
      searchControl.setResultSetSize(google.search.Search.LARGE_RESULTSET);
    
      searchControl.addSearcher(new google.search.WebSearch());
  searchControl.addSearcher(new google.search.VideoSearch());
  searchControl.addSearcher(new google.search.BlogSearch());
  searchControl.addSearcher(new google.search.NewsSearch());
  searchControl.addSearcher(new google.search.ImageSearch());
  
      var drawOptions = new google.search.DrawOptions();
      drawOptions.setDrawMode(google.search.SearchControl.DRAW_MODE_TABBED);

");
echo('
      searchControl.draw(document.getElementById("cont"), drawOptions);
   ');

echo'searchControl.execute("';
echo $term;
echo'")';
echo';';


   

 echo('

}
    google.setOnLoadCallback(OnLoad);
    </script>
  </head>
');

echo('
<style>


.gsc-tabHeader.gsc-tabhActive{

padding-top: 1%;
padding-bottom: 1%;
padding-right: 3%;
padding-left: 3%;
border: 0px;
right: 0px;
background:rgb(184, 184, 184);
}

.gsc-tabHeader.gsc-tabhInactive{
padding-top: 1%;
padding-bottom: 1%;
padding-right: 3%;
padding-left: 3%;
border: 0px;
right: 0px;
background: rgb(241, 241, 241);
}

#cont{
position: absolute;
margin-left: 3%;
height: auto;
width: 90%;


}

form.gsc-search-box{

display: none;
}

.gsc-control{
width: 100%;
}


#search{
text-indent: 2%;
height: 30px;
width: 77%;
display: inline-block;
outline: hidden;
border: 0px;
margin-left: 3%;
-webkit-box-shadow: 0px 0px 5px 0px #000 inset;
}

#search:focus{
-webkit-box-shadow: 0px 0px 5px 0px #12aadd inset;
outline: 1px solid rgb(8, 93, 219);
}
');

echo("
#button{
 width: 13%;
height: 33px;
color: #fff;
padding: 1px 1px 1px 1px;
display: inline-block;
text-align: center;
line-height: 31px;
font-weight: bold;
border: 0px;
background: rgb(122,188,255);
-webkit-transition: background 0.5s;
text-shadow: 1px 1px #cdcdcd;
border-radius: 1px;
}

#button:hover{
-webkit-transition: background 0.5s;
background: rgb(40,147,255);
color: #fff;
text-shadow: 0px 0px #000;
}

");
echo('
#sear{
height: auto;
width: auto;
}
</style>

');

}

else{

$term="";

echo('
<!DOCTYPE html>

<html>
<head>

<title> Search </title>
<style>

#search2{
text-indent: 2%;
height: 30px;
width: 77%;
display: inline-block;
outline: hidden;
border: 0px;
margin-left: 3%;
-webkit-box-shadow: 0px 0px 5px 0px #000 inset;
}

#search2:focus{
-webkit-box-shadow: 0px 0px 5px 0px #12aadd inset;
outline: 1px solid rgb(8, 93, 219);
}

#button2{
 width: 13%;
height: 33px;
color: #fff;
padding: 1px 1px 1px 1px;
display: inline-block;
text-align: center;
line-height: 31px;
font-weight: bold;
border: 0px;
background: rgb(122,188,255);
-webkit-transition: background 0.5s;
text-shadow: 1px 1px #cdcdcd;
border-radius: 1px;
}

#button2:hover{
-webkit-transition: background 0.5s;
background: rgb(40,147,255);
color: #fff;
text-shadow: 0px 0px #000;
}


#sear2{
height: auto;
width: 100%;
top: 50%;
position: absolute;
}




</style>

');

}

echo('
</head>
  <body style="font-family: Arial;border: 0 none;overflow-x: hidden;">
');

if(isset($_GET['s']) && strlen($_GET['s'])>0){
echo('<div id="sear"><form name="term2" action="" method="get">
<input id="search" name="s" type="text" value="'.$term.'"></input>
<input type="submit" id="button"></input>
</form></div>

<div id="cont"">
 <div id="content">Loading...</div>
</div>
');
}

else{

if(isset($_GET['s'])){
$keu="";
}

else{

$keu="Enter keyword to search...";
}


echo('
<div id="sear2">
<form name="term2" action="" method="get">
<input id="search2" name="s" type="text" value="'.$keu.'" '.$text.'></input>
<input type="submit" id="button2"></input>
</form></div>');

}

echo('</body>
</html>');

​?>