<?php

// $numbOne = intval(readline());
// $numbTwo = intval(readline());
// $numbThree = intval(readline());
$numbOne = 1;
$numbTwo = 2;
$numbThree = 5;

$numbers = [$numbOne, $numbTwo, $numbThree];
rsort($numbers);

foreach($numbers as $numb){
    echo $numb, PHP_EOL;
}

?>