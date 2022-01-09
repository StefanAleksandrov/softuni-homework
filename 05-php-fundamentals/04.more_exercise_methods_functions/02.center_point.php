<?php
function calculateDistance($x, $y){
    return sqrt($x**2 + $y**2);
}

$x1 = intval(readline());
$y1 = intval(readline());
$x2 = intval(readline());
$y2 = intval(readline());

$distance1 = calculateDistance($x1, $y1);
$distance2 = calculateDistance($x2, $y2);

if ($distance1 < $distance2){
    echo '(' . $x1 . ', ' . $y1 . ')';
} else if ($distance2 < $distance1) {
    echo '(' . $x2 . ', ' . $y2 . ')';
}
?>