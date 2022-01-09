<?php
function charsInRange($charOne, $charTwo){
    $asciiOne = ord($charOne);
    $asciiTwo = ord($charTwo);
    $start = min($asciiOne, $asciiTwo);
    $end = max($asciiOne, $asciiTwo);
    $result = '';

    for ($i = $start + 1; $i < $end; $i++) { 
        $result = $result . chr($i) . ' ';
    }

    return $result;
}

echo charsInRange(readline(), readline());
?>