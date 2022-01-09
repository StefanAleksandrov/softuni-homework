<?php
$inputNumber = intval(readline());
$productsArr = [];

for ($i = 0; $i < $inputNumber; $i++) { 
    $productsArr[] = readline();
}

sort($productsArr);

for ($i = 0; $i < count($productsArr); $i++) { 
    echo $i + 1 . '.' . $productsArr[$i], PHP_EOL;
}
?>