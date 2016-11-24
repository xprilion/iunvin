<?php
$ch = curl_init("http://iunv.in");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

$title = preg_match('!<title>(.*?)</title>!i', $result, $matches) ? $matches[1] : 'No title found';
$description = preg_match('!<meta name="description" content="(.*?)">!i', $result, $matches) ? $matches[1] : 'No meta description found';
echo $title . '<br>';
echo $description . '<br>';
?>