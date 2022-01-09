<?php
function factorial($number){
    $result = 1;

    while ($number > 0){
        $result *= $number;
        $number--;
    }

    return $result;
}

echo sprintf('%.2f',factorial(intval(readline())) / factorial(intval(readline())));
?>