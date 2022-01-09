<?php

$numberOfLines = 1;
// $numberOfLines = intval(readline());

for ($i = 0; $i < $numberOfLines; $i++) { 
    $input = "1000 2000";
    // $input = readline();
    $numbersArray = explode(" ", $input);
    $maxNumber =  max($numbersArray);
    $stringLength = strlen($maxNumber);
    $sum = 0;

    for ($j = 0; $j < $stringLength; $j++) { 
        $sum += intval($maxNumber[$j]);
    }

    echo $sum, PHP_EOL;
}

?>