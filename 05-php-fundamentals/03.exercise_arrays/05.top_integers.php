<?php
$inputArr = explode(' ', readline());
$limit = count($inputArr);
$topIntegers = [];

for ($i = 0; $i < $limit; $i++) {
    $integer = intval($inputArr[$i]);

    for ($j = $i + 1; $j < $limit; $j++) { 
        $nextInteger = intval($inputArr[$j]);

        if ($integer <= $nextInteger) break;
        else if ($j == $limit - 1) $topIntegers[] = $integer;
    }

    if ($i == $limit - 1) $topIntegers[] = $integer;
}

echo implode(' ', $topIntegers);
?>