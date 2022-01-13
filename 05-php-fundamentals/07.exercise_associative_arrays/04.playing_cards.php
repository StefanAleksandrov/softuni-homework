<?php
$valuePower = [
    '1' => 1,
    '2' => 2,
    '3' => 3,
    '4' => 4,
    '5' => 5,
    '6' => 6,
    '7' => 7,
    '8' => 8,
    '9' => 9,
    '10' => 10,
    'J' => 11,
    'Q' => 12,
    'K' => 13,
    'A' => 14
];
$typeMultiplier = [
    'S' => 4,
    'H' => 3,
    'D' => 2,
    'C' => 1
];
$people = [];
$command = readline();

while ($command != 'JOKER') {
    $data = explode(': ', $command);
    if (!isset($people[$data[0]])) $people[$data[0]] = [];
    $cards = explode(', ', $data[1]);

    foreach ($cards as $card) {
        if (!in_array($card, $people[$data[0]])) $people[$data[0]][] = $card;
    }

    $command = readline();
}

$peopleScores = array_map(function ($el) use ($valuePower, $typeMultiplier){
    $sum = 0;

    foreach ($el as $card) {
        if ($card[1] !== '0') {
            $value = $valuePower[$card[0]];
            $multiplier = $typeMultiplier[$card[1]];
        } else {
            $value = $valuePower['10'];
            $multiplier = $typeMultiplier[$card[2]];
        }

        $sum += $value * $multiplier;
    }

    return $sum;
}, $people);

foreach ($peopleScores as $person => $score) {
    echo $person . ': ' . $score, PHP_EOL;
}
?>