<?php
function calcRectangleArea($sideA, $sideB){
    return $sideA * $sideB;
}

$sideA = intval(readline());
$sideB = intval(readline());

echo (calcRectangleArea($sideA, $sideB));
?>