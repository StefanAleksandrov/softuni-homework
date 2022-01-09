<?php

$number = intval(readline());
$divisors = [ 10, 7, 6, 3, 2];
$output = '';

foreach($divisors as $divisor){
    if($number % $divisor == 0) {
        $output = "The number is divisible by $divisor";
        break;
    }
}

if ($output == "") {
    $output = 'Not divisible';
}

echo $output;

?>