<?php
$limitInput = intval(readline());

for ($ch = 1; $ch <= $limitInput; $ch++) {
    $sum = 0;
    $currentNumber = $ch;

    while ($ch >= 1) {
        $sum += $ch % 10;
        $ch = $ch / 10;
    }

    $isSpecialNumber = (($sum == 5) || ($sum == 7) || ($sum == 11)) ? "True" : "False";
    echo sprintf("%d -> %s", $currentNumber, $isSpecialNumber) . PHP_EOL;
    $ch = $currentNumber;
}
?>