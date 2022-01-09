<?php
function mathOperations($firstNumber, $operator, $secondNumber){
    switch($operator){
        case '/':
            return $firstNumber / $secondNumber;
            break;
        case '*':
            return $firstNumber * $secondNumber;
            break;
        case '+':
            return $firstNumber + $secondNumber;
            break;
        case '-':
            return $firstNumber - $secondNumber;
            break;
    }
}

$firstNumber = intval(readline());
$operator = readline();
$secondNumber = intval(readline());

echo sprintf('%.2f', mathOperations($firstNumber, $operator, $secondNumber));
?>