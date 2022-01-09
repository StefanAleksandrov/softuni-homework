<?php

$lostGamesCount = 7;
$headsetPrice = 2;
$mousePrice = 3;
$keyboardPrice = 4;
$monitorPrice = 5;
// $lostGamesCount = intval(readline());
// $headsetPrice = floatval(readline());
// $mousePrice = floatval(readline());
// $keyboardPrice = floatval(readline());
// $monitorPrice = floatval(readline());

$headsetTrashed = floor($lostGamesCount / 2);
$mouseTrashed = floor($lostGamesCount / 3);
$keyboardTrashed = floor($lostGamesCount / 6);
$monitorTrashed = floor($lostGamesCount / 12);

$result = ($headsetPrice * $headsetTrashed) + ($mousePrice * $mouseTrashed) + ($keyboardPrice * $keyboardTrashed) + ($monitorPrice * $monitorTrashed);

echo sprintf('Rage expenses: %.2f lv.', $result);

?>