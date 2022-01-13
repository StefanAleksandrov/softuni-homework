<?php
$inputExample = [
    'Pesho-Java-91',
    'Gosho-C#-84',
    'Kiro-JavaScript-90',
    'Kiro-C#-50',
    'Kiro-banned',
    'Gosho-banned',
    'exam finished',
];
$examList = [];
$submissions = [];
$command = array_shift($inputExample);

while($command != 'exam finished'){
    $data = explode('-', $command);

    if ($data[1] == 'banned'){
        //TODO
        foreach ($examList as $key => $value) {
            foreach($value as $personKey => $person){
                $name = explode(' | ', $person)[0];
                if ($data[0] == $name) unset($examList[$key][$personKey]);
            }
        }

    } else {
        if (isset($examList[$data[1]])){
            $exists = false;

            foreach ($examList[$data[1]] as $key => $value) {
                $currentData = explode(' | ', $value);
                if ($currentData[0] == $data[0]){
                    $exists = true;
                    $maxValue = max(intval($currentData[1]), intval($data[2]));
                    $examList[$data[1]][$key] = "$currentData[0] | $maxValue";
                }
            }

            if (!$exists) $examList[$data[1]][] = "$data[0] | $data[2]";
        } else {
            $examList[$data[1]] = ["$data[0] | $data[2]"];
        }

        if (isset($submissions[$data[1]])) $submissions[$data[1]] += 1;
        else $submissions[$data[1]] = 1;
    }

    $command = array_shift($inputExample);
}

echo 'Results:', PHP_EOL;
$resultsList = [];

foreach ($examList as $language => $people) {
    foreach ($people as $person) {
        $resultsList[] = $person;
    }
}

uasort($resultsList, function($personA, $pesonB){
    $dataA = explode(' | ', $personA);
    $dataB = explode(' | ', $pesonB);

    if ($dataB[1] == $dataA[1]) return $dataA[0] <=> $dataB[0];
    return $dataB[1] <=> $dataA[1];
});

foreach ($resultsList as $person){
    echo $person, PHP_EOL;
}

uasort($submissions, function($valA, $valB){
    return $valB <=> $valA;
});

echo 'Submissions:', PHP_EOL;

foreach ($submissions as $key => $value) {
    echo "$key - $value", PHP_EOL;
}
?>