<?php
$finalArray = [];
$command = explode(' ', readline());

while($command[0] !== 'Print'){
    switch ($command[0]) {
        case 'Push':
            array_unshift($finalArray, $command[1]);
            break;

        case 'Add':
            array_push($finalArray, $command[1]);
            break;

        case 'Pop':
            array_shift($finalArray);
            break;

        case 'Enqueue':
            array_pop($finalArray);
            break;
    }

    $command = explode(' ', readline());
}

echo implode(' ', $finalArray);
?>