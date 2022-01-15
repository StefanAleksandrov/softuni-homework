<?php
$limit = intval(readline());
$catalogue = [];

for ($i = 0; $i < $limit; $i++) {
    $data = explode(' : ', readline());
    if (isset($catalogue[$data[0][0]])) $catalogue[$data[0][0]][$data[0]] = $data[1];
    else $catalogue[$data[0][0]] = [$data[0] => $data[1]];
    // $catalogue[$data[0]] = $data[1];
}

uksort($catalogue, function($keyA, $keyB){
    return $keyA <=> $keyB;
});

foreach ($catalogue as $letter => $items) {
    echo "$letter", PHP_EOL;

    uksort($items, function($keyA, $keyB){
        return $keyA <=> $keyB;
    });

    foreach ($items as $name => $price) {
        echo " $name: $price", PHP_EOL;
    }
}
?>