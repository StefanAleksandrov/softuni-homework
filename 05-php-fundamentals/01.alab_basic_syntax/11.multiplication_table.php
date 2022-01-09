<?php

$numb = intval(readline());
$multiplier = intval(readline());

do {
    $result = $numb * $multiplier;
    echo "$numb X $multiplier = $result", PHP_EOL;
    $multiplier++;
} while ($multiplier <= 10);

?>