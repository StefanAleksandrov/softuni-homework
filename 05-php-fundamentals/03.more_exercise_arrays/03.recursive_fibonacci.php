<?php
$inputLimit = intval(readline());
$fibonacciSeq = [1, 1];

for ($i = 1; $i < 50; $i++) { 
    $fibonacciSeq[] = $fibonacciSeq[$i] + $fibonacciSeq[$i - 1];
}

echo $fibonacciSeq[$inputLimit - 1];
?>