<?php
$limit = intval(readline());
$studentsList = [];

for ($i = 0; $i < $limit; $i++) { 
    $name = readline();
    $grade = floatval(readline());
    if (isset($studentsList[$name])) $studentsList[$name][] = $grade;
    else  $studentsList[$name] = [$grade];
}

$filteredList = array_filter($studentsList, function ($el){
    return array_sum($el) / count($el) >= 4.5;
});

uksort($filteredList, function ($keyA, $keyB) use($filteredList){
    return array_sum($filteredList[$keyB]) / count($filteredList[$keyB]) <=> array_sum($filteredList[$keyA]) / count($filteredList[$keyA]);
});

foreach ($filteredList as $key => $value) {
    echo $key . ' -> ' . number_format(array_sum($value) / count($value), 2, '.', ''), PHP_EOL;
}
?>