<?php
// $pokePower = intval(readline());
// $distance = intval(readline());
// $exhaustionFactor = intval(readline());
$pokePower = 4;
$distance = 2;
$exhaustionFactor = 0;

$initialPower = $pokePower;
$pokedTargets = 0;

while ($pokePower >= $distance){
    $pokePower -= $distance;
    $pokedTargets++;

    if ($pokePower == ($initialPower / 2) && ($exhaustionFactor != 0) && ($pokePower / $exhaustionFactor >= 1)){
        $pokePower = intval($pokePower / $exhaustionFactor);
    }
}

echo $pokePower, PHP_EOL;
echo $pokedTargets;
?>