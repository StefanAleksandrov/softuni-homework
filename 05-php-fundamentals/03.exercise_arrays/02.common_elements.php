<?php
$firstArr = explode(' ', readline());
$secondArr = explode(' ', readline());
$output = '';

foreach ($secondArr as $elem) {
    if (in_array($elem, $firstArr)){
        $output = $output . $elem . ' ';
    }
}

echo $output;
?>