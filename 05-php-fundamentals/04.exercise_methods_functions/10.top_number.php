<?php
function topNumber($limit){
    for ($i = 1; $i <= $limit ; $i++) { 
        $string = strval($i);
        $sum = sumOfDigits($string);;

        for ($j = 0; $j < strlen($string); $j++) { 
            if (intval($string[$j]) % 2 == 1 && $sum % 8 == 0){
                echo $string, PHP_EOL;
                break;
            }
        }
    }
}

function sumOfDigits($string){
    $sum = 0;

    for ($i = 0; $i < strlen($string); $i++) { 
        $sum += intval($string[$i]);
    }

    return $sum;
}

topNumber(intval(readline()));
?>