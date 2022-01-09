<?php
$inputArr = explode(' ', readline());
$index = 0;
$newIndex = 0;
$sum = 0;

while(isset($inputArr[$index])){
    $sum += $inputArr[$index];
    $newIndex = $index + $inputArr[$index];

    if (!isset($inputArr[$newIndex])){
        $newIndex = $index - $inputArr[$index];
    }

    $index = $newIndex;
}

echo $sum;
?>