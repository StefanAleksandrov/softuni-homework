<?php
$inputNumbers = explode(' ', readline());
$limit = count($inputNumbers);
$output = [];

for ($i = 0; $i < $limit; $i++) { 
    $number = $inputNumbers[$i];
    if (isset($output[$number])) $output[$number] += 1;
    else $output[$number] = 1;
}

uksort($output, function($keyA, $keyB){
    return $keyA <=> $keyB;
});

foreach ($output as $key => $value) {
    echo "$key -> $value", PHP_EOL;
}
?>