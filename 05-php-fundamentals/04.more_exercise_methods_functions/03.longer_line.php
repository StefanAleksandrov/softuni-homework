<?php
function calculateDistance($x1, $y1, $x2, $y2){
    return sqrt(abs($x1 - $x2)**2 + abs($y1 - $y2)**2);
}

function calculateDistanceToZero($x, $y){
    return sqrt($x**2 + $y**2);
}

$x1 = floatval(readline());
$y1 = floatval(readline());
$x2 = floatval(readline());
$y2 = floatval(readline());
$x3 = floatval(readline());
$y3 = floatval(readline());
$x4 = floatval(readline());
$y4 = floatval(readline());

$line1 = calculateDistance($x1, $y1, $x2, $y2);
$line2 = calculateDistance($x3, $y3, $x4, $y4);

if ($line1 < $line2){
    $distance3 = calculateDistanceToZero($x3, $y3);
    $distance4 = calculateDistanceToZero($x4, $y4);

    if($distance3 < $distance4){
        echo '(' . $x3 . ', ' . $y3 . ')(' . $x4 . ', ' . $y4 . ')';
    } else {
        echo '(' . $x4 . ', ' . $y4 . ')(' . $x3 . ', ' . $y3 . ')';
    }
} else if ($line2 <= $line1) {
    $distance1 = calculateDistanceToZero($x1, $y1);
    $distance2 = calculateDistanceToZero($x2, $y2);

    if ($distance1 < $distance2){
        echo '(' . $x1 . ', ' . $y1 . ')(' . $x2 . ', ' . $y2 . ')';
    } else {
        echo '(' . $x2 . ', ' . $y2 . ')(' . $x1 . ', ' . $y1 . ')';
    }
}
?>