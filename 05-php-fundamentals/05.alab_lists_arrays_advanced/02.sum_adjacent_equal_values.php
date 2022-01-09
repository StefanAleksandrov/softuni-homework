<?php
$inputArr = array_map('floatval', explode(' ', readline()));

for ($i = 0; $i < count($inputArr) - 1; $i++) { 
    if ($inputArr[$i] == $inputArr[$i + 1]) {
        $sum = $inputArr[$i] * 2;
        array_splice($inputArr, $i, 2, $sum);
        $i = max(-1, $i - 2);
    }
}

echo implode(' ', $inputArr);
?>