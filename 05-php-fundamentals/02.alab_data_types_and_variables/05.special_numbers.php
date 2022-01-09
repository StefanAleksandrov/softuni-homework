<?php

// $inputNumber = readline();
$inputNumber = '15';
$limit = intval($inputNumber);

for ($i = 1; $i <= $limit; $i++) {
    $currentNumber = strval($i);
    $newLimit = strlen($currentNumber);
    $sum = 0;

    for ($j = 0; $j < $newLimit; $j++) {
        $sum += intval($currentNumber[$j]);
    }

    if ($sum == 5 || $sum == 7 || $sum == 11) {
        echo $currentNumber . ' -> True', PHP_EOL;

    } else {
        echo $currentNumber . ' -> False', PHP_EOL;
    }
}

?>