<?php

// $peopleCount = intval(readline());
// $groupType = readline();
// $weekDay = readline();
$peopleCount = 110;
$groupType = 'Business';
$weekDay = 'Friday';

$discount = [
    'Students' => ($peopleCount >= 30) ? 0.85 : 1,
    'Business' => ($peopleCount >= 100) ? (($peopleCount - 10) / $peopleCount) : 1,
    'Regular' => ($peopleCount >= 10 && $peopleCount <= 20) ? 0.95 : 1,
];

$singlePersonPrice = [
    'Friday' => [
        'Students' => 8.45,
        'Business' => 10.9,
        'Regular' => 15,
    ],
    'Saturday' => [
        'Students' => 9.8,
        'Business' => 15.6,
        'Regular' => 20,
    ],
    'Sunday' => [
        'Students' => 10.46,
        'Business' => 16,
        'Regular' => 22.5,
    ],
];

$totalPrice = $peopleCount * $singlePersonPrice[$weekDay][$groupType] * $discount[$groupType];
$totalPrice = max($totalPrice, 0);
echo 'Total price: ' . number_format($totalPrice, 2, '.', '');

?>