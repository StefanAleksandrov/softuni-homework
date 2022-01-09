<?php

// $centuries = intval(readline());
$centuries = 1;
$years = $centuries * 100;
$days = floor($years * 365.2422);
// $days = $years * 365 + ceil(0.24 * $years) + floor($years / 400);
$hours = $days * 24;
$minutes = $hours * 60;

echo "$centuries centuries = $years years = $days days = $hours hours = $minutes minutes";


?>