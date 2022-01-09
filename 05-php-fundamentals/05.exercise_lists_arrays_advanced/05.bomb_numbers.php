<?php
$inputArr = array_map('floatval', explode(' ', readline()));
$bombArr = array_map('floatval', explode(' ', readline()));

while(in_array($bombArr[0], $inputArr)){
    $index = max(0, array_search($bombArr[0], $inputArr) - $bombArr[1]);
    $length = 1 + 2 * $bombArr[1];
    array_splice($inputArr, $index, $length);
}

echo array_sum($inputArr);
?>