<?php
function palindrom($number){
    $inverted = '';
    $limit = strlen($number);

    for ($i = $limit - 1; $i >= 0; $i--) { 
        $inverted = $inverted . $number[$i];
    }

    if ($inverted == $number){
        return 'true';
    } else {
        return 'false';
    }
}

$command = readline();

while ($command != 'END'){
    echo palindrom($command), PHP_EOL;
    $command = readline();
}
?>