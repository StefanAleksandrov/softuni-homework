<?php

$numb = intval(readline());

for ($i = 1; $i <= 10; $i++) {
    $result = $i * $numb;
    echo "$numb X $i = $result", PHP_EOL;
}

?>