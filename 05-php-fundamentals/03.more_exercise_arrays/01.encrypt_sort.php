<?php
$vowels = [ 'A', 'E', 'I', 'O', 'U', 'a', 'e', 'i', 'o', 'u' ];
$inputLimit = intval(readline());
$outputArr = [];

for ($i = 0; $i < $inputLimit; $i++) {
    $inputName = readline();
    $stringLength = strlen($inputName);
    $sum = 0;

    for ($j = 0; $j < $stringLength; $j++) {
        $letter = $inputName[$j];
        if (in_array($letter, $vowels)) $code = intval(ord($letter)) * $stringLength;
        else $code = intval(intval(ord($letter)) / $stringLength);
        $sum += $code;
    }

    $outputArr[] = $sum;
}

sort($outputArr);

foreach($outputArr as $code){
    echo $code, PHP_EOL;
}
?>