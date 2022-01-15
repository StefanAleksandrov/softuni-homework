<?php
$command = readline();
$juiceList = [];
$bottlesList = [];

while ($command != 'End'){
    $data = explode(' => ', $command);
    if (isset($juiceList[$data[0]])) $juiceList[$data[0]] += intval($data[1]);
    else $juiceList[$data[0]] = intval($data[1]);

    while ($juiceList[$data[0]] >= 1000){
        if (isset($bottlesList[$data[0]])) $bottlesList[$data[0]] += 1;
        else $bottlesList[$data[0]] = 1;
        $juiceList[$data[0]] -= 1000;
    }

    $command = readline();
}

foreach ($bottlesList as $key => $value) {
    echo "$key => $value", PHP_EOL;
}
?>