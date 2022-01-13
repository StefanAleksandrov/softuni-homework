<?php
$goldList = [];

while(true){
    $type = readline();
    if ($type == 'stop') break;
    $karats = intval(readline());
    if (isset($goldList[$type])) $goldList[$type] += $karats;
    else $goldList[$type] = $karats;
}

foreach ($goldList as $type => $karats) {
    echo "{$type} -> {$karats}K", PHP_EOL;
}
?>