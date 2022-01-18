<?php
$input = readline();
$limit = strlen($input);
$uniqueSymbols = [];
$output = '';
$currentString = '';

for ($i = 0; $i < $limit; $i++) {
    $char = strtoupper($input[$i]);
    if (!isset($uniqueSymbols[$char]) && !is_numeric($char)) $uniqueSymbols[$char] = 1;

    if (is_numeric($char)){
        if (isset($input[$i + 1]) && is_numeric($input[$i + 1])){
            $currentNumber = intval($char.$input[$i + 1]);
            $i++;
        } else {
            $currentNumber = intval($char);
        }

        if ($currentNumber > 0) $output .= str_repeat($currentString, $currentNumber);
        $currentString = '';

    } else {
        $currentString .= $char;
    }
}

echo "Unique symbols used: " . count($uniqueSymbols), PHP_EOL;
echo $output;
?>