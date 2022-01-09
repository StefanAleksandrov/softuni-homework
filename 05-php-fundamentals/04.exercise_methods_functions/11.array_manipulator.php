<?php
$array = explode(' ', readline());
$command = readline();

$arrayOfInputCommands = [
    'exchange 1' => 'exchange 5',
    'exchange 5' => 'exchange 3',
    'exchange 3' => 'end'
];

function exchange ($index, $array) {
    if ($index < 0 || $index >= count($array)){
        echo 'Invalid index', PHP_EOL;
        return $array;
        
    } else {
        $newArr = [];

        for ($i = 1; $i <= count($array); $i++) { 
            if ($i + $index < count($array) && isset($array[$i + $index])) $newArr[] = $array[$i + $index];
        }

        for ($i = 0; $i <= $index ; $i++) { 
            if (isset($array[$i])) $newArr[] = $array[$i];
        }

        return $newArr;
    }
};

function maxNumber($payload, $array){
    $result = $payload == 'even' ? 0 : 1;
    $maxNumbers = [];

    for ($i = 0; $i < count($array); $i++) { 
        if ($array[$i] % 2 == $result) $maxNumbers[] = [ 'index' => $i, 'value' => $array[$i]];
    }

    if (count($maxNumbers) == 0){
        echo 'No matches', PHP_EOL;
        return;
    }

    usort($maxNumbers, function($a, $b){
        if ($b['value'] == $a['value']) return $b['index'] - $a['index'];
        else return $b['value'] - $a['value'];
    });

    echo($maxNumbers[0]['index']), PHP_EOL;
}

function minNumber($payload, $array){
    $result = $payload == 'even' ? 0 : 1;
    $minNumbers = [];

    for ($i = 0; $i < count($array); $i++) { 
        if ($array[$i] % 2 == $result) $minNumbers[] = [ 'index' => $i, 'value' => $array[$i]];
    }

    if (count($minNumbers) == 0){
        echo 'No matches', PHP_EOL;
        return;
    }

    usort($minNumbers, function($a, $b){
        if ($b['value'] == $a['value']) return $b['index'] - $a['index'];
        else return $a['value'] - $b['value'];
    });

    echo($minNumbers[0]['index']), PHP_EOL;
}

function firstNumbers($numbers, $payload, $array){
    if ($numbers > count($array)){
        echo 'Invalid count', PHP_EOL;
        return;
    }

    $result = $payload == 'even' ? 0 : 1;
    $firstNumbers = [];

    for ($i = 0; $i < count($array); $i++) { 
        if(count($firstNumbers) < $numbers && $array[$i] % 2 == $result) $firstNumbers[] = $array[$i];
    }

    echo '[' . implode(', ', $firstNumbers) . ']', PHP_EOL;
}

function lastNumbers($numbers, $payload, $array){
    if ($numbers > count($array)){
        echo 'Invalid count', PHP_EOL;
        return;
    }

    $result = $payload == 'even' ? 0 : 1;
    $firstNumbers = [];

    for ($i = count($array) - 1; $i >= 0; $i--) { 
        if(count($firstNumbers) < $numbers && $array[$i] % 2 == $result) $firstNumbers[] = $array[$i];
    }

    echo '[' . implode(', ', array_reverse($firstNumbers)) . ']', PHP_EOL;
}

while ($command != 'end'){
    $arrayOfCommands = explode(' ', $command);

    switch ($arrayOfCommands[0]){
        case 'exchange':
            $array = exchange(intval($arrayOfCommands[1]), $array);
            break;
        case 'max':
            maxNumber($arrayOfCommands[1], $array);
            break;
        case 'min':
            minNumber($arrayOfCommands[1], $array);
            break;
        case 'first':
            firstNumbers($arrayOfCommands[1], $arrayOfCommands[2], $array);
            break;
        case 'last':
            lastNumbers($arrayOfCommands[1], $arrayOfCommands[2], $array);
            break;
    }

    $command = readline();
}

echo '[' . implode(', ', $array) . ']';
?>