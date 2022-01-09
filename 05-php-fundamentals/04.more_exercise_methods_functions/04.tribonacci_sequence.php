<?php
function sumLastThree($array){
    $sum = 0;
    $start = count($array) - 1;
    $end = max(($start - 2), 0);

    for ($i = $start; $i >= $end; $i--) { 
        $sum += $array[$i];
    }

    return $sum;
}

function tribonacciSequence($limit, $seq){
    while(count($seq) < $limit){
        $seq[] = sumLastThree($seq);
    }

    echo implode(' ', $seq);
}

$inputNumber = intval(readline());
$sequence = [1];
tribonacciSequence($inputNumber, $sequence);
?>