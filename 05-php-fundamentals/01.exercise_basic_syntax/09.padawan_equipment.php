<?php

// $moneyBalance = floatval(readline());
// $studentsCount = intval(readline());
// $lightsaberPrice = floatval(readline());
// $robePrice = floatval(readline());
// $beltPrice = floatval(readline());
$moneyBalance = 100.00;
$studentsCount = 1;
$lightsaberPrice = 5.0;
$robePrice = 4.0;
$beltPrice = 3.0;

$neededMoney = (ceil($studentsCount * 1.1) * $lightsaberPrice) + ($studentsCount * $robePrice) + (($studentsCount - floor($studentsCount / 6)) * $beltPrice);

if ($neededMoney > $moneyBalance) {
    $neededMoneylv = round($neededMoney - $moneyBalance, 2);
    echo 'Ivan Cho will need ' . number_format($neededMoneylv, 2, '.', '') . 'lv more.';
} else {
    echo 'The money is enough - it would cost ' . number_format($neededMoney, 2) . 'lv.';
}

?>