<?php
$coursesList = [];
$command = readline();

while ($command !== 'end') {
    $data = explode(' : ', $command);
    if (isset($coursesList[$data[0]])) $coursesList[$data[0]][] = $data[1];
    else $coursesList[$data[0]] = [$data[1]];
    $command = readline();
}

uasort($coursesList, function($elA, $elB){
    return count($elB) <=> count($elA);
});

foreach ($coursesList as $key => $value) {
    echo "$key: " . count($value), PHP_EOL;
    sort($value);

    foreach ($value as $student) {
        echo "-- $student", PHP_EOL;
    }
}
?>