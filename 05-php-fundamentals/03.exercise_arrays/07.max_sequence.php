<?php
$inputArr = explode(' ', readline());
$limit = count($inputArr);
$longestSequenceArr = [];
$currSequenceArr = [];
$currElement = null;

for ($i = 0; $i < $limit; $i++) {
    $elem = intval($inputArr[$i]);

    if (!is_null($currElement) && $currElement == $elem){
        $currSequenceArr[] = $elem;

        if (($i == $limit - 1) && count($currSequenceArr) > count($longestSequenceArr)){
            $longestSequenceArr = $currSequenceArr;
        }

    } else if (is_null($currElement)){
        $currElement = $elem;

    } else if (!is_null($currElement) && $currElement != $elem){
        $currElement = $elem;
        
        if (count($currSequenceArr) > count($longestSequenceArr)) {
            $longestSequenceArr = $currSequenceArr;
        }

        $currSequenceArr = [];

    } else {
        echo 'Not caught case', PHP_EOL;
    }
}

$longestSequenceArr[] = $longestSequenceArr[0];
echo implode(' ', $longestSequenceArr);
?>