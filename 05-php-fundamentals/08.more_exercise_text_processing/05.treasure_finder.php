<?php
$inputExample = [
    "1 2 1 3",
    "ikegfp'jpne)bv=41P83X@",
    "ujfufKt)Tkmyft'duEprsfjqbvfv=53V55XA",
    "find"
];
$keysList = explode(' ', readline());
$keysCount = count($keysList);
$command = readline();

while ($command != 'find') {
    $limit = strlen($command);
    $message = '';

    for ($i = 0; $i < $limit; $i++) { 
        $keyIndex = $i % $keysCount;
        $message .= chr(ord($command[$i]) - $keysList[$keyIndex]);
    }

    $treasureType = explode('&', $message)[1];
    $treasureCoordinates = str_replace('>', '', explode('<', $message)[1]);
    echo "Found {$treasureType} at {$treasureCoordinates}", PHP_EOL;
    $command = readline();
}
?>