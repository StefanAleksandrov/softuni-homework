<?php

$a = floatval(readline());
$b = floatval(readline());

if (abs($a-$b) <= 0.000001) {
    echo 'True';
} else {
    echo 'False';
}

?>