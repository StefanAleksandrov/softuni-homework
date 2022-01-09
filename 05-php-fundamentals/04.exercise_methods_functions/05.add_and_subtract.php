<?php
function calculate($firstNumber, $secondNumber, $thirdNumber){
    return $firstNumber + $secondNumber - $thirdNumber;
}

echo calculate(intval(readline()), intval(readline()), intval(readline()));
?>