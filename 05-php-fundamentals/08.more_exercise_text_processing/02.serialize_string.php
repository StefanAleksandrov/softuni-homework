<?php
$inputString = readline();
$limit = strlen($inputString);
$data = [];

for ($i = 0; $i < $limit; $i++){
    $char = $inputString[$i];
    if (!isset($data[$char])) $data[$char] = [$i];
    else $data[$char][] = $i;
}

foreach ($data as $key => $value) {
    $indexes = implode('/', $value);
    echo "{$key}:{$indexes}", PHP_EOL;
}
?>