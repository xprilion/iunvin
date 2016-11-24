
<?php

if(isset($_GET['url'])){
$url=$_GET['url'];
echo('<script>

var counter = setInterval(timer, 1000);

function timer() {
    var unixtime = document.getElementById("timeset");
    var count = parseInt(unixtime.innerHTML, 10);
    unixtime.innerHTML = count - 1;

    if (count < 1) {
        clearInterval(counter);
        return;
    }

    var days = Math.floor(count / 86400);
    var hours = Math.floor(count / 3600) % 24;
    var minutes = Math.floor(count / 60) % 60;
    var seconds = count % 60;

    document.getElementById("time").innerHTML= seconds + "s"; // watch for spelling
}


</script>');


echo('Crawled Successfully:<b> '.$url.'</b><br><hr><br>');
echo('<META HTTP-EQUIV="refresh" CONTENT="5;URL=texter.php">
Crawling next page in <div id="time" style="display: inline; color: #f00;">10s</div> seconds! <br><br>
<a href="texted.php">STOP CRAWL PROCESS!</a><div id="timeset" style="display: none;">9</div>');
}

else{

echo('Crawl stopped! <a href="texter.php">INITIATE CRAWL PROCESS!</a><br><br>');
}
?>