<?php

// $number = readline();
$number = '145';
$limit = strlen($number);
$sumFactoriels = 0;

for ($i=0; $i < $limit; $i++) { 
    $currentNumber = $number[$i];
    $currentFactoriel = 1;

    for ($j = intval($currentNumber); $j > 0 ; $j--) { 
        $currentFactoriel *= $j;
    }

    $sumFactoriels += $currentFactoriel;
}

echo ($number == $sumFactoriels) ? 'yes' : 'no';

?>