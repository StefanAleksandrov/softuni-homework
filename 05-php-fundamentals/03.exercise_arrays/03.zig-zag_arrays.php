<?php
$firstArr = [];
$secondArr = [];
$countInput = intval(readline());

for ($i = 0; $i < $countInput; $i++) { 
    $inputIntegers = explode(' ', readline());

    if ($i % 2 == 0){
        $firstArr[] = $inputIntegers[0];
        $secondArr[] = $inputIntegers[1];
    } else {
        $firstArr[] = $inputIntegers[1];
        $secondArr[] = $inputIntegers[0];
    }
}

echo implode(' ', $firstArr), PHP_EOL, implode(' ', $secondArr);
?>