<?php

// $startNumber = intval(readline());
// $endNumber = intval(readline());
$startNumber = 0;
$endNumber = 26;

$outputSequence = '';
$sum = 0;

for ($i = $startNumber; $i <= $endNumber; $i++) { 
    if ($i == $endNumber) $outputSequence = $outputSequence . $i;
    else $outputSequence = $outputSequence . $i . ' ';
    $sum += $i;
}

echo "$outputSequence\nSum: $sum";

?>