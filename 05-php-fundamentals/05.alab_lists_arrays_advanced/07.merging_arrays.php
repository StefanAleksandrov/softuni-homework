<?php
$firstArr = explode(' ', readline());
$secondArr = explode(' ', readline());
$result = [];
$limit = max(count($firstArr), count($secondArr));

for ($i = 0; $i < $limit; $i++) { 
    if (isset($firstArr[$i])) $result[] = $firstArr[$i];
    if (isset($secondArr[$i])) $result[] = $secondArr[$i];
}

echo implode(' ', $result);
?>