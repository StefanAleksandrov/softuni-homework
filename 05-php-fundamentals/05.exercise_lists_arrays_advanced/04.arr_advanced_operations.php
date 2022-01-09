<?php
$inputArr = array_map('intval', explode(' ', readline()));
$command = explode(' ', readline());
$commandsArr = [
    'Insert 3 0' => 'Remove 10',
    'Remove 10' => 'Insert 8 6',
    'Insert 8 6' => 'Shift right 1',
    'Shift right 1' => 'Shift left 2',
    'Shift left 2' => 'End'
];

while($command[0] !== 'End'){
    switch($command[0]){
        case 'Add':
            array_push($inputArr, intval($command[1]));
            break;
        case 'Insert':
            if ($command[2] < 0 || $command[2] > count($inputArr)) echo 'Invalid index', PHP_EOL;
            else array_splice($inputArr, intval($command[2]), 0, intval($command[1]));
            break;
        case 'Remove':
            if (!isset($inputArr[$command[1]])) echo 'Invalid index', PHP_EOL;
            else array_splice($inputArr, intval($command[1]), 1);
            break;
        case 'Shift':
            if($command[1] == 'left'){
                for ($i = 0; $i < intval($command[2]); $i++) {
                    $firstItem = array_shift($inputArr);
                    array_push($inputArr, $firstItem);
                }
            } else if ($command[1] == 'right'){
                for ($i = 0; $i < intval($command[2]); $i++) {
                    $lastItem = array_pop($inputArr);
                    array_unshift($inputArr, $lastItem);
                }
            }
            break;
    }
    $command = explode(' ', readline());
}

echo implode(' ', $inputArr), PHP_EOL;
?>