<?php
$inputArr = explode(' ', readline());
$output = '';

foreach ($inputArr as $string) {
    $output .= str_repeat($string, strlen($string));
}

echo $output;
?>