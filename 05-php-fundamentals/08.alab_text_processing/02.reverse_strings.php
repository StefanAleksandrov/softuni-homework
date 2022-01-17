<?php
$inputString = readline();

while ($inputString != 'end') {
    echo "{$inputString} = " . strrev($inputString), PHP_EOL;
    $inputString = readline();
}
?>