<?php
$registeredCars = [];
$limit = intval(readline());

for ($i = 0; $i < $limit; $i++) { 
    $command = explode(' ', readline());

    if ($command[0] == 'register'){
        if (isset($registeredCars[$command[1]])){
            echo "ERROR: already registered with plate number {$registeredCars[$command[1]]}", PHP_EOL;
        } else {
            $registeredCars[$command[1]] = $command[2];
            echo "{$command[1]} registered {$command[2]} successfully", PHP_EOL;
        }
    } else {
        if (isset($registeredCars[$command[1]])){
            unset($registeredCars[$command[1]]);
            echo "{$command[1]} unregistered successfully", PHP_EOL;
        } else {
            echo "ERROR: user {$command[1]} not found", PHP_EOL;
        }
    }
}

foreach ($registeredCars as $person => $plate) {
    echo "$person => $plate", PHP_EOL;
}
?>