<?php

$batchesAmount = 1;
// $batchesAmount = intval(readline());
$measurements = [
    'singleCookie' => 25,
    'cup' => 140,
    'smallSpoon' => 10,
    'bigSpoon' => 20,
    'cookiesPerBox' => 5,

];
$totalBoxes = 0;

for ($i=0; $i < $batchesAmount; $i++) { 
    // $flourInGrams = intval(readline());
    // $sugarInGrams = intval(readline());
    // $cocoaInGrams = intval(readline());
    $flourInGrams = 100;
    $sugarInGrams = 200;
    $cocoaInGrams = 50;

    $totalCookiesPerBake = floor(($measurements['cup'] + $measurements['smallSpoon'] + $measurements['bigSpoon']) * min(floor($flourInGrams / $measurements['cup']), floor($sugarInGrams / $measurements['bigSpoon']), floor($cocoaInGrams / $measurements['smallSpoon'])) / $measurements['singleCookie']);

    if ($totalCookiesPerBake <= 0) {
        echo 'Ingredients are not enough for a box of cookies.', PHP_EOL;
    } else {
        $currentBoxes = floor($totalCookiesPerBake / $measurements['cookiesPerBox']);
        $totalBoxes += $currentBoxes;
        echo sprintf('Boxes of cookies: %.0f', $currentBoxes), PHP_EOL;
    }
}

echo sprintf('Total boxes: %.0f', $totalBoxes);

?>