<?php
$inputNumbers = array_map('intval', explode(' ', readline()));
$command = explode(' ', readline());

while($command[0] !== 'end'){
    switch ($command[0]) {
        case 'swap':
            $firstEl = $inputNumbers[intval($command[1])];
            $inputNumbers[intval($command[1])] = $inputNumbers[intval($command[2])];
            $inputNumbers[intval($command[2])] = $firstEl;
            break;

        case 'multiply':
            $inputNumbers[intval($command[1])] *= $inputNumbers[intval($command[2])];
            break;

        case 'decrease':
            $inputNumbers = array_map(function($el) use ($command){
                return $el -= intval($command[1]);
            }, $inputNumbers);
            break;

        case 'increase':
            $inputNumbers = array_map(function($el) use ($command){
                return $el += intval($command[1]);
            }, $inputNumbers);
            break;

        case 'remove':
            array_splice($inputNumbers, intval($command[1]), 1);
            break;
    }

    $command = explode(' ', readline());
}

echo implode(', ', $inputNumbers);
?>