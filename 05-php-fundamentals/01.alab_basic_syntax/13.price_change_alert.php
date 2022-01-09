<?php
$numberInput = 3;
$limitInput = 0.1;
$last = 10;
// $numberInput = intval(readline());
// $limitInput = floatval(readline());
// $last = floatval(readline());

for ($i = 0; $i < $numberInput - 1; $i++) {
    $c = 11 + $i;
    // $c = floatval(readline());
    $div = ($c - $last) / $last;
    $isSignificantDifference = abs($div) >= $limitInput;
    $to = "";

    if ($div == 0) {
        $to = "NO CHANGE: " . $c;
    } else if (!$isSignificantDifference) {
        $to = sprintf("MINOR CHANGE: %f to %f (%.2f%%)", $last, $c, $div * 100);
    } else if ($isSignificantDifference && ($div > 0)) {
        $to = sprintf("PRICE UP: %f to %f (%.2f%%)", $last, $c, $div * 100);
    } else if ($isSignificantDifference && ($div < 0))
        $to = sprintf("PRICE DOWN: %f to %f (%.2f%%)", $last, $c, $div * 100);
    echo $to . PHP_EOL;
    $last = $c;
}
?>