<?php
function calculate($com, $first, $second){
    switch($com){
        case 'add':
            echo $first + $second;
            break;
        case 'multiply':
            echo $first * $second;
            break;
        case 'subtract':
            echo $first - $second;
            break;
        case 'divide':
            echo $first / $second;
            break;
    }
}

$command = readline();
$firstNumber = floatval(readline());
$secondNumber = floatval(readline());
calculate($command, $firstNumber, $secondNumber);
?>