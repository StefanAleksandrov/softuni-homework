<?php
function evensByOdds($data){
    $limit = strlen($data);
    $evenSum = 0;
    $oddSum = 0;

    for ($i = 0; $i < $limit; $i++) { 
        $currNumber = intval($data[$i]);

        if ($currNumber % 2 == 0) $evenSum += $currNumber;
        else if ($currNumber % 2 == 1) $oddSum += $currNumber;
    }

    return $evenSum * $oddSum;
}

$number = readline();

echo evensByOdds($number);
?>