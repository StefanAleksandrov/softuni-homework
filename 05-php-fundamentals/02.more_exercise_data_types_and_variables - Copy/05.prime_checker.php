<?php

$limit = intval(readline());

for ($i = 2; $i <= $limit; $i++) {
    $isPrime = true;
    for ($j = 2; $j < $i; $j++) {
        if ($i % $j == 0) {
            $isPrime = false;
            break;
        }
    }

    if ($isPrime)
        printf("%d -> true" . PHP_EOL, $i);
    else
        printf("%d -> false" . PHP_EOL, $i);
}
