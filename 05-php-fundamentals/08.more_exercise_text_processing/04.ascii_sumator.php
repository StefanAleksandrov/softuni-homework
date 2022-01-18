<?php
$first = ord(readline());
$second = ord(readline());
$string = readline();
$limit = strlen($string);
$sum = 0;
$start = min($first, $second);
$end = max($first, $second);

for ($i = 0; $i < $limit; $i++) { 
    $value = ord($string[$i]);
    if ($start < $value && $value < $end) $sum += $value;
}

echo $sum;
?>