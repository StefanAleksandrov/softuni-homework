<?php
$inputArr = array_map('intval', explode(' ', readline()));
$inputSum = intval(readline());
$limit = count($inputArr);

for ($i = 0; $i < $limit; $i++) {
    for ($j = $i + 1; $j < $limit; $j++) { 
        if ($inputArr[$i] + $inputArr[$j] == $inputSum) echo "$inputArr[$i] $inputArr[$j]", PHP_EOL;
    }
}
?>