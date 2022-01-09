<?php
function signOfInteger($integer){
    if ($integer && isset($integer[0]) && $integer[0] == '-'){
        echo "The number $integer is negative.", PHP_EOL;
    } else if ($integer && isset($integer[0]) && $integer[0] != '-' && $integer != 0){
        echo "The number $integer is positive.", PHP_EOL;
    } else if ($integer == 0){
        echo 'The number 0 is zero.', PHP_EOL;
    }
}

$inputInteger = readline();
signOfInteger($inputInteger);
?>