<?php
$inputArr = array_map('intval', explode(' ', readline()));
$newInteger = readline();

while($newInteger != 'end'){
    $index = intval($newInteger[0]);
    $integer = intval($newInteger);
    array_splice($inputArr, $index, 0, $integer);
    $newInteger = readline();
}

echo implode(' ', $inputArr);
?>