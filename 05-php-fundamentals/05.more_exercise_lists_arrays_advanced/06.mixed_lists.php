<?php
$firstArr = array_map('intval', explode(' ', readline()));
$secondArr = array_map('intval', explode(' ', readline()));

$limit = max(count($firstArr), count($secondArr));
$combinedArr = [];
$conditionsArr = [];

for ($i = 0; $i < $limit; $i++) { 
    if (isset($firstArr[$i]) && isset($secondArr[$i])){
        $combinedArr[] = $firstArr[$i];
        $combinedArr[] = $secondArr[$i];
    } else if (isset($firstArr[$i])){
        $conditionsArr[] = $firstArr[$i];
    } else if (isset($secondArr[$i])){
        $conditionsArr[] = $secondArr[$i];
    }
}

$min = min($conditionsArr);
$max = max($conditionsArr);

$finalArr = array_filter($combinedArr, function($el) use ($min, $max) {
    if ($el > $min && $el < $max) return $el;
});

asort($finalArr);
echo implode(' ', $finalArr);
?>