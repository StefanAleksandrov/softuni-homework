<?php
$encryptedMessage = readline();
$integersArray = [];
$takeArray = [];
$skipArray = [];
$charsArray = [];
$result = '';

for ($i = 0; $i < strlen($encryptedMessage); $i++) { 
    $char = $encryptedMessage[$i];
    if (intval($char) == $char) $integersArray[] = intval($char);
    else $charsArray[] = $char;
}

for ($i = 0; $i < count($integersArray); $i++) { 
    if ($i % 2 == 0) $takeArray[] = $integersArray[$i];
    else $skipArray[] = $integersArray[$i];
}

$currentIndex = 0;
for ($i = 0; $i < count($takeArray); $i++) {
    $result .= implode("", array_slice($charsArray, $currentIndex, $takeArray[$i]));
    $currentIndex += $takeArray[$i] + $skipArray[$i];
}

echo $result;
?>