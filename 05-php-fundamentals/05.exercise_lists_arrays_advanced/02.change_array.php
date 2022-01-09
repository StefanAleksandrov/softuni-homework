<?php
$inputArr = array_map('intval', explode(' ', readline()));
$command = readline();
$inputCommands = [
    'Delete 5' => 'Insert 10 1',
    'Insert 10 1' => 'Delete 7',
    'Delete 7' => 'Odd'
];

while($command != 'Odd' && $command != 'Even'){
    $actionsArr = explode(' ', $command);
    $element = intval($actionsArr[1]);

    switch($actionsArr[0]){
        case 'Delete':
            while (in_array($element, $inputArr)){
                $index = array_search($element, $inputArr, false);
                if (isset($inputArr[$index])) array_splice($inputArr, $index, 1);
            }
            break;
        case 'Insert':
            $index = intval($actionsArr[2]);
            array_splice($inputArr, $index, 0, $element);
            break;
    }

    $command = readline();
}

if($command == 'Odd'){
    $number = 1;
} else if ($command == 'Even'){
    $number = 0;
}

echo implode(' ', array_filter($inputArr, function($el) use ($number) {
    return $el % 2 == $number;
}));
?>