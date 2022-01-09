<?php
$limitInput = intval(readline());
$numbersArr = [];

for ($i = 0; $i < $limitInput; $i++) { 
    $numbersArr[] = intval(readline());
}

$arrLength = count($numbersArr);

for ($i = $arrLength - 1; $i >= 0 ; $i--) { 
    if (isset($numbersArr[$i])) echo $numbersArr[$i] . ' ';
}
?>