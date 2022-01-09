<?php
$startingArr = explode(' ', readline());
$limit = count($startingArr) - 1;
$output = '';

for ($i = $limit; $i >= 0 ; $i--) { 
    $output = $output . $startingArr[$i] . ' ';
}

echo $output;
?>