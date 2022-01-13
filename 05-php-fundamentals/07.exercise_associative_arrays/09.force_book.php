<?php
$forceList = [];
$command = readline();

while ($command != 'Lumpawaroo') {
    if (strpos($command, '|')){
        $data = explode(' | ', $command);

        if (isset($forceList[$data[0]]) && !in_array($data[1], $forceList[$data[0]])) $forceList[$data[0]][] = $data[1];
        else if (!isset($forceList[$data[0]])) $forceList[$data[0]] = [$data[1]];

    } else if (strpos($command, '->')){
        $data = explode(' -> ', $command);

        if (!isset($forceList[$data[1]]) || !in_array($data[0], $forceList[$data[1]])){
            foreach ($forceList as $key => $value) {
                $forceList[$key] = array_filter($value, function($member) use($data){
                    return $member !== $data[0];
                });
            }
    
            if (isset($forceList[$data[1]]) && !in_array($data[0], $forceList[$data[1]])) $forceList[$data[1]][] = $data[0];
            else if (!isset($forceList[$data[1]])) $forceList[$data[1]] = [$data[0]];
    
            echo "$data[0] joins the $data[1] side!", PHP_EOL;
        }
    }

    $command = readline();
}

uksort($forceList, function($keyA, $keyB) use($forceList){
    if (count($forceList[$keyA]) == count($forceList[$keyB])) return $keyA <=> $keyB;
    else return  count($forceList[$keyB]) <=> count($forceList[$keyA]);
});

foreach ($forceList as $key => $value) {
    $count = count($value);
    if ($count < 1) continue;
    echo "Side: $key, Members: $count", PHP_EOL;
    sort($value);

    foreach ($value as $member) {
        echo "! $member", PHP_EOL;
    }
}
?>