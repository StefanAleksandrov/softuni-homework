<?php
$inputArr = array_map('floatval', explode(' ', readline()));
$leftTime = 0;
$rightTime = 0;

while(count($inputArr) > 1){
    $left = array_shift($inputArr);
    $right = array_pop($inputArr);
    
    $leftTime = $left == 0 ? $leftTime * 0.8 : $leftTime + $left;
    $rightTime = $right == 0 ? $rightTime * 0.8 : $rightTime + $right;
}

if ($leftTime < $rightTime) echo sprintf('The winner is left with total time: %s', $leftTime);
else if ($rightTime < $leftTime) echo sprintf('The winner is right with total time: %s', $rightTime);
?>