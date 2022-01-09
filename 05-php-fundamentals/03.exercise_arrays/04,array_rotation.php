<?php
$inputArr = explode(' ', readline());
$rotationsCount = intval(readline());

for ($i = 0; $i < $rotationsCount; $i++) {
    $firstElem = array_shift($inputArr);
    $inputArr[] = $firstElem;
}

echo implode(' ', $inputArr);
?>