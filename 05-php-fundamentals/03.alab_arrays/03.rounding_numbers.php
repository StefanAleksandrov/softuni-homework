<?php
$input = readline();
$numbersArr = array_map('floatval', explode(' ', $input));
foreach($numbersArr as $floatNumber){
    $round = round($floatNumber, 0);
    echo sprintf("%.2f => %.0f", $floatNumber, $round), PHP_EOL;
}
?>