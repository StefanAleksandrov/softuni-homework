<?php
$inputStringsList = explode(' ', readline());
$first = $inputStringsList[0];
$second = $inputStringsList[1];
$limit = max(strlen($first), strlen($second));
$totalSum = 0;

for ($i = 0; $i < $limit; $i++) { 
    if (isset($first[$i]) && isset($second[$i])) $totalSum += ord($first[$i]) * ord($second[$i]);
    else if (isset($first[$i])) $totalSum += ord($first[$i]);
    else if (isset($second[$i])) $totalSum += ord($second[$i]);
}

echo $totalSum;
?>