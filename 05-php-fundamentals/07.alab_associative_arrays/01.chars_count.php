<?php
$inputString = readline();
$limit = strlen($inputString);
$output = [];

for ($i = 0; $i < $limit; $i++) { 
    $char = $inputString[$i];
    if (isset($output[$char])) $output[$char] += 1;
    else $output[$char] = 1;
}

foreach ($output as $key => $value) {
    echo "$key -> $value", PHP_EOL;
}
?>