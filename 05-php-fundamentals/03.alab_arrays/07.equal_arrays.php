<?php
$firstArray = array_map('intval', explode(' ', readline()));
$secondArray = array_map('intval', explode(' ', readline()));
$limit = count($firstArray);
$sum = 0;
$areEqual = true;

for ($i = 0; $i < $limit ; $i++) {
    if ($firstArray[$i] == $secondArray[$i]) $sum += $firstArray[$i];
    else {
        echo "Arrays are not identical. Found difference at $i index.";
        $areEqual = false;
        break;
    }
}

if ($areEqual) echo "Arrays are identical. Sum: $sum";
?>