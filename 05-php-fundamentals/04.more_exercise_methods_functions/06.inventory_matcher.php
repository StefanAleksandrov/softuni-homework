<?php
$productsArray = explode(' ', readline());
$quantitiesArray = array_map('floatval', explode(' ', readline()));
$pricesArray = explode(' ', readline());
$limit = count($productsArray);
$product = readline();

while($product != 'done'){
    $index = array_search($product, $productsArray);

    if ($index >= 0 && $index < $limit) {
        echo sprintf('%s costs: %s; Available quantity: %.0f', $productsArray[$index], $pricesArray[$index], $quantitiesArray[$index]), PHP_EOL;
    }

    $product = readline();
}
?>