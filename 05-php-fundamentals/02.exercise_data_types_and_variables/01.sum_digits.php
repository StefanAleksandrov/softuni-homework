<?php

$inputNumber = '245678';
// $inputNumber = readline();
$limit = strlen($inputNumber);
$sum = 0;

for ($i = 0; $i < $limit; $i++) { 
    $sum += intval($inputNumber[$i]);
}

echo $sum;

?>