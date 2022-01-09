<?php

$availableGames = [
    'OutFall 4' => 39.99,
    'CS: OG' => 15.99,
    'Zplinter Zell' => 19.99,
    'Honored 2' => 59.99,
    'RoverWatch' => 29.99,
    'RoverWatch Origins Edition' => 39.99
];

$currentBalance = floatval(readline());
$gameInput = readline();
$totalSpentMoney = 0;

while($gameInput != 'Game Time' && $currentBalance > 0){
    if (isset($availableGames[$gameInput])) {
        if ($currentBalance >= $availableGames[$gameInput]){
            $currentBalance -= $availableGames[$gameInput];
            $totalSpentMoney += $availableGames[$gameInput];
            echo "Bought $gameInput", PHP_EOL;

        } else {
            echo 'Too Expensive', PHP_EOL;
        }

    } else {
        echo 'Not Found', PHP_EOL;
    }

    $gameInput = readline();
}

if ($currentBalance == 0){
    echo 'Out of money!', PHP_EOL;

} else {   
    echo sprintf('Total spent: $%.2f. Remaining: $%.2f', $totalSpentMoney, $currentBalance), PHP_EOL;
}

?>