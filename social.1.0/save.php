<?php
$file = $_POST['fiel'];
$current = $_POST['text'];
file_put_contents($file, $current);

$lines = file($file);

foreach ($lines as $line_num => $line) {
    echo "" . htmlspecialchars($line) . "<br />\n";
}
?>