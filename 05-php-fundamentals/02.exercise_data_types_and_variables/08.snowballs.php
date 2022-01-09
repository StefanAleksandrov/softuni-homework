<?php
$snowballsCount = intval(readline());
$bestSnowballValue = 0;

for ($i = 0; $i < $snowballsCount; $i++) {
    $snowballSnow = readline();
    $snowballTime = readline();
    $snowballQuality = readline();

    $snowballValue = intval(($snowballSnow / $snowballTime) ** $snowballQuality);

    if($snowballValue >= $bestSnowballValue) {
        $bestSnowballSnow = $snowballSnow;
        $bestSnowballTime = $snowballTime;
        $bestSnowballQuality = $snowballQuality;
        $bestSnowballValue = $snowballValue;
    }
}

if ($bestSnowballValue > 0){
    echo sprintf('%.0f : %.0f = %.0f (%.0f)', $bestSnowballSnow, $bestSnowballTime, $bestSnowballValue, $bestSnowballQuality);
}
?>