<?php
$companiesList = [];
$command = readline();

while ($command != 'End'){
    $data = explode(' -> ', $command);
    if (!isset($companiesList[$data[0]])) $companiesList[$data[0]] = [$data[1]];
    else if (!in_array($data[1], $companiesList[$data[0]])) $companiesList[$data[0]][] = $data[1];
    $command = readline();
}

uksort($companiesList, function($companyA, $companyB){
    return $companyA <=> $companyB;
});

foreach ($companiesList as $company => $employees) {
    echo $company, PHP_EOL;

    foreach ($employees as $employee) {
        echo "-- $employee", PHP_EOL;
    }
}
?>