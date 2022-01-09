<?php

$limit = intval(readline());
$sum = 0;

for ($i=1; $i < $limit* 2; $i += 2) { 
    echo $i, PHP_EOL;
    $sum += $i;
}

echo "Sum: $sum";

?>