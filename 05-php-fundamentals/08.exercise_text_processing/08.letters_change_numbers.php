<?php
$inputList = explode(' ', readline());
$inputList = array_filter($inputList);
$totalSum = 0;

foreach ($inputList as $input) {
    $firstLetter = $input[0];
    $lastLetter = substr($input, -1);
    $number = intval(substr($input, 1, strlen($input) - 2));

    if (ord($firstLetter) <= 90) $number /= (ord($firstLetter) - 64);
    else $number *= (ord($firstLetter) - 96);

    if (ord($lastLetter) <= 90) $number -= (ord($lastLetter) - 64);
    else $number += (ord($lastLetter) - 96);

    $totalSum += $number;
}

echo number_format($totalSum, 2, '.', '');
?>