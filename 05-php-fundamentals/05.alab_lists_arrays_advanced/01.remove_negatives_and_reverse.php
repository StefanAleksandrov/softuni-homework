<?php
$inputArr = array_map('intval', explode(' ', readline()));
$inputArr = array_reverse(array_filter($inputArr, function($element){
    return $element >= 0;
}));
if (count($inputArr) < 1) $inputArr = ['empty'];
echo implode(' ', $inputArr);
?>