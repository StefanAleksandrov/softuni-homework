<?php
$number1 = floatval(readline());
$number2 = floatval(readline());
$number3 = floatval(readline());

if ($number1 == 0 || $number2 == 0 || $number3 == 0){
    echo 'zero';
} else {
    $result = $number1 * $number2 * $number3;

    if ($result < 0) echo 'negative';
    else echo 'positive';
}
?>