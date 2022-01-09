<?php
$inputArray = array_map('intval', explode(' ', readline()));
$command = readline();

while($command != 'end'){
    $explodedCommand = explode(' ', $command);
    $action = $explodedCommand[0];

    switch($action){
        case 'Add':
            $number = intval($explodedCommand[1]);
            array_push($inputArray, $number);
            break;
        case 'Remove':
            $number = intval($explodedCommand[1]);
            $index = array_search($number, $inputArray);
            array_splice($inputArray, $index, 1);
            break;
        case 'RemoveAt':
            $number = intval($explodedCommand[1]);
            array_splice($inputArray, $number, 1);
            break;
        case 'Insert':
            $number = intval($explodedCommand[1]);
            $index = intval($explodedCommand[2]);
            array_splice($inputArray, $index, 0, $number);
            break;
    }

    $command = readline();
}

echo implode(' ', $inputArray);
?>