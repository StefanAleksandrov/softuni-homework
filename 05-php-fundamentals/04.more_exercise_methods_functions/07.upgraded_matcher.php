<?php
$productsArray = explode(' ', readline());
$quantitiesArray = array_map('floatval', explode(' ', readline()));
$pricesArray = explode(' ', readline());
$limit = count($productsArray);
$product = explode(' ', readline());

while($product[0] != 'done'){
    $index = array_search($product[0], $productsArray);

    if(!isset($quantitiesArray[$index]) || ($quantitiesArray[$index] < floatval($product[1]))){
        echo sprintf('We do not have enough %s', $productsArray[$index]);
        break;
    }

    if ($index >= 0 && $index < $limit) {
        $totalPrice = $pricesArray[$index] * floatval($product[1]);
        $quantitiesArray[$index] -= floatval($product[1]);
        echo sprintf('%s x %s costs %.2f', $product[0], $product[1], $totalPrice), PHP_EOL;
    }

    $product = explode(' ', readline());
}
?>