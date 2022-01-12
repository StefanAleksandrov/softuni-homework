<?php
$inputArr = explode(', ', readline());
$limit = count($inputArr);
$output = [];

for ($i = 0; $i < $limit; $i += 2) { 
    $city = $inputArr[$i];
    $income = intval($inputArr[$i + 1]);

    if (isset($output[$city])) $output[$city] += $income;
    else $output[$city] = $income;
}

foreach ($output as $key => $value) {
    echo "$key => $value", PHP_EOL;
}
?>