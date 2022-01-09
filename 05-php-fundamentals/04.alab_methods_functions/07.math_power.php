<?php
function calcRectangleArea($number, $power){
    // return $number ** $power;
    return pow($number, $power);
}

$number = floatval(readline());
$power = floatval(readline());

echo (calcRectangleArea($number, $power));
?>