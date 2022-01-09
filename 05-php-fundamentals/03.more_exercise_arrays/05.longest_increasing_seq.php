<?php
$inputArr = array_map('intval', explode(' ', readline()));
$outputArr = [];

foreach($inputArr as $value){
    $limit = count($outputArr);

    for ($i = 0; $i < $limit; $i++) { 
        if ($outputArr[$i][count($outputArr[$i]) - 1] < $value){
            $outputArr[] = $outputArr[$i];
            $outputArr[$i][] = $value;
        }
    }

    $outputArr[] = [$value];
}

$longestSeq = [];

for ($i = 0; $i < count($outputArr); $i++) { 
    if (count($outputArr[$i]) > count($longestSeq)) $longestSeq = $outputArr[$i];
}

echo implode(' ', $longestSeq);
?>