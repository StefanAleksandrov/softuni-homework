<?php
$inputArr = explode(' ', readline());
$command = explode(' ', readline());

$listOfCommands = [
    'Required Paper 8' => 'OutOfStock Clothes',
    'OutOfStock Clothes' => 'Required Chocolate 2',
    'Required Chocolate 2' => 'JustInCase Hat',
    'JustInCase Hat' => 'OutOfStock Cable',
    'OutOfStock Cable' => 'No Money'

];

while($command[0] != 'No' && $command[0] != 'Money'){
    switch($command[0]){
        case 'OutOfStock':
            $item = $command[1];
            foreach ($inputArr as $key => $value) {
                if ($value == $item) unset($inputArr[$key]);
            }
            break;
        case 'Required':
            $newGift = $command[1];
            $index = intval($command[2]);
            if (isset($inputArr[$index])) array_splice($inputArr, $index, 1, $newGift);
            else array_splice($inputArr, $index, 0, $newGift);
            break;
        case 'JustInCase':
            $lastElem = array_pop($inputArr);
            $inputArr[] = $command[1];
            break;
        default: echo 'Unknown command ' . $command[0]; 
    }

    $command = explode(' ', readline());
}

echo implode(' ', $inputArr);
?>