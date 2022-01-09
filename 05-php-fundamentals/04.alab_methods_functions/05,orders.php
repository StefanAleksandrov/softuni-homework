<?php
function orderTotalSum($product, $quantity){
    $totalSum = 0;
    $product = strtolower($product);

    switch($product){
        case 'coffee':
            $totalSum = $quantity * 1.5;
            break;
        case 'water':
            $totalSum = $quantity;
            break;
        case 'coke':
            $totalSum = $quantity * 1.4;
            break;
        case 'snacks':
            $totalSum = $quantity * 2;
            break;
    }

    echo sprintf('%.2f', $totalSum);
}

$product = readline();
$quantity = intval(readline());
orderTotalSum($product, $quantity);
?>