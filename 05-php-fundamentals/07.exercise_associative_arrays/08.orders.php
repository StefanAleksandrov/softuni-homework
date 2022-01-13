<?php
$productsList = [];
$command = readline();

while ($command != 'buy'){
    $data = explode(' ', $command);

    if (isset($productsList[$data[0]])){
        $productsList[$data[0]][0] = floatval($data[1]);
        $productsList[$data[0]][1] += intval($data[2]);
    } else {
        $productsList[$data[0]] = [floatval($data[1]), intval($data[2])];
    }

    $command = readline();
}

foreach ($productsList as $key => $value) {
    $sum = number_format($value[0] * $value[1], 2, '.', '');
    echo "$key -> $sum", PHP_EOL;
}
?>