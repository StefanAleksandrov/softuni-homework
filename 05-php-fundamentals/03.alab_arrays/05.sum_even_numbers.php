<?php
$startingArr = array_map('intval', explode(' ', readline()));
$limit = count($startingArr) - 1;
$sum = 0;

for ($i = $limit; $i >= 0 ; $i--) { 
    if (isset($startingArr[$i]) && $startingArr[$i] % 2 == 0) $sum += $startingArr[$i];
}

echo $sum;
?>