<?php
$inputString = implode('', explode('1', readline()));
$limit = strlen($inputString);
$explosionPower = 0;
$outputString = '';

for ($i = 0; $i < $limit; $i++) { 
    $char = $inputString[$i];
    if ($char == intval($char) && $inputString[$i - 1] == '>') $explosionPower += intval($char);

    if ($explosionPower > 0 && $char != '>') $explosionPower--;
    else $outputString .= $char;
}

echo $outputString;
?>