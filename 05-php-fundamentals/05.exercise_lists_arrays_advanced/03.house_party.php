<?php
$numberOfPeople = intval(readline());
$guestsArr = [];

for ($i = 0; $i < $numberOfPeople; $i++) { 
    $command = explode(' ', readline());

    switch($command[2]){
        case 'not':
            if (in_array($command[0], $guestsArr)){
                $index = array_search($command[0], $guestsArr);
                array_splice($guestsArr, $index, 1);
            } else {
                echo $command[0] . ' is not in the list!', PHP_EOL;
            }
            break;
        case 'going!':
            if (in_array($command[0], $guestsArr)){
                echo $command[0] . ' is already in the list!', PHP_EOL;
            } else {
                $guestsArr[] = $command[0];
            }
            break;
    }
}

echo implode("\n", $guestsArr);
?>