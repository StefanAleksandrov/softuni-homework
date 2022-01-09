<?php
$inputArr = array_map('floatval', explode(' ', readline()));
$outputArr = [];

while(count($inputArr) > 0){
    $outputArr[] = array_shift($inputArr) + array_pop($inputArr);
}

echo implode(' ', $outputArr);
?>