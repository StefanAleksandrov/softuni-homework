<?php
$inputLimit = intval(readline());
$outputArr = [];
$lastArr = [];

for ($i = 0; $i < $inputLimit; $i++) { 
    $currArr = [];
    $currArrLimit = 1 + count($lastArr);

    for ($j = 0; $j < $currArrLimit; $j++) { 
        if (isset($lastArr[$j - 1]) && isset($lastArr[$j])) $currArr[] = $lastArr[$j - 1] + $lastArr[$j];
        else $currArr[] = 1;
    }

    $lastArr = $currArr;
    $outputArr[] = implode(' ', $currArr);
}

foreach($outputArr as $value){
    echo $value, PHP_EOL;
}
?>