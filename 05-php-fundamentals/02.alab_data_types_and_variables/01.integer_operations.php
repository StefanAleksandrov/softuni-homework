<?php

$firstNumb = intval(readline());
$secondNumb = intval(readline());
$thirdNumb = intval(readline());
$fourthNumb = intval(readline());

$result = floor(($firstNumb + $secondNumb) / $thirdNumb) * $fourthNumb;
echo $result;

?>