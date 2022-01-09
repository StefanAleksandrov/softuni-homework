<?php
$inputArr = explode(' ', readline());
$limit = count($inputArr);
$equalSumsFound = false;

for ($i = 0; $i < $limit; $i++) {
    $integer = intval($inputArr[$i]);
    $sumOne = 0;
    $sumTwo = 0;

    for ($j = $i + 1; $j < $limit; $j++) { 
        $sumTwo += intval($inputArr[$j]);
    }

    for ($k = 0; $k < $i; $k++) {
        $sumOne += intval($inputArr[$k]);
    }

    if ($sumOne == $sumTwo){
        $equalSumsFound = true;
        echo $i;
        break;
    }
}

if (!$equalSumsFound) echo 'no';
?>