<?php
$inputArr = explode(' ', readline());
$outputArr = readline();

foreach ($inputArr as $value) {
    $outputArr[] = intval(strrev($value));
}

echo array_sum($outputArr);
?>