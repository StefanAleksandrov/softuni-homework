<?php
$inputString = readline();
$limit = strlen($inputString);
$condition = readline();
$totalSum = 0;

for ($i = 0; $i < $limit; $i++){
    $char = $inputString[$i];
    $value = ord($char);
    if (($condition == 'LOWERCASE' && $char == strtolower($char) && 96 < $value && $value < 123) || ($condition == 'UPPERCASE' && $char = strtoupper($char) && 64 < $value && $value < 91)){
        $totalSum += $value;
    }
}

echo "The total sum is: $totalSum";
?>