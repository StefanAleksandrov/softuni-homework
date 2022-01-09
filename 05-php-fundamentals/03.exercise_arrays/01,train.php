<?php
$wagonsCount = intval(readline());
$train = [];
$sum = 0;

for ($i = 0; $i < $wagonsCount; $i++) { 
    $currentWagon = intval(readline());
    $train[] = $currentWagon;
    $sum += $currentWagon;
}

echo implode(' ', $train), PHP_EOL;
echo $sum;
?>