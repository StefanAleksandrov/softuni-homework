<?php
$numbersArray = array_map('intval', explode(' ', readline()));
$limit = count($numbersArray);

while ($limit > 1){
    $newArray = [];

    for ($i = 0; $i < $limit ; $i++) {
        if (isset($numbersArray[$i]) && isset($numbersArray[$i + 1])) {
            $sum = 0;
            $sum += $numbersArray[$i] + $numbersArray[$i + 1];
            $newArray[] = $sum;
        }
    }

    $numbersArray = $newArray;
    $limit = count($numbersArray);
}

echo $numbersArray[0];
?>