<?php

$totalCoins = 0;
$acceptedCoins = ['0.1', '0.2', '0.5', '1', '2'];
$price = [
    'Nuts' => 2,
    'Water' => 0.7,
    'Crisps' => 1.5,
    'Soda' => 0.8,
    'Coke' => 1
];
$hasStarted = false;

$inputs = ['0.5', '0.2', '0.1', 'Start', 'Soda', 'End'];

while(true){
    // $input = readline();
    $input = array_shift($inputs);

    if ($input == 'Start'){
        $hasStarted = true;
        continue;

    } else if ($input == 'End'){
        break;

    } else if ($hasStarted){
        if (isset($price[$input])) {
            if (floatval(number_format($totalCoins, 2)) < floatval(number_format($price[$input], 2))){
                echo 'Sorry, not enough money', PHP_EOL;

            } else {
                $totalCoins -= $price[$input];
                echo 'Purchased ' . strtolower($input), PHP_EOL;
            }

        } else {
            echo 'Invalid product', PHP_EOL;
        }

    } else {
        if (in_array($input, $acceptedCoins)){
            $totalCoins += floatval($input);

        } else {
            echo "Cannot accept $input", PHP_EOL;
        }
    }
}

echo 'Change: ' . number_format($totalCoins, 2, '.', '');

?>