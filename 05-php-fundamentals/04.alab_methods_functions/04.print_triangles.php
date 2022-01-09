<?php
function printNumbersBetween($start, $end){
    $string = '';

    for ($i = $start; $i <= $end ; $i++) { 
        $string = $string . $i . ' ';
    }

    echo $string, PHP_EOL;
}

function printTriangle($size){
    if ($size <= 0) return;
 
    for ($i = 1; $i <= $size ; $i++) { 
        printNumbersBetween(1, $i);
    }
 
    for ($i = $size - 1; $i >= 1 ; $i--) { 
        printNumbersBetween(1, $i);
    }
}

$triangleSize = intval(readline());
printTriangle($triangleSize);
?>