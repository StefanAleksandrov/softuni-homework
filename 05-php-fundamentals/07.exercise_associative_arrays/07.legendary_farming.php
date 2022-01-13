<?php
$materials = [
    'shards' => 0,
    'fragments' => 0,
    'motes' => 0
];
$isObtained = false;

while (true) {
    $command = strtolower(readline());
    $data = explode(' ', $command);
    $limit = count($data);

    for ($i = 0; $i < $limit; $i += 2) { 
        if (isset($materials[$data[$i + 1]])) $materials[$data[$i + 1]] += intval($data[$i]);
        else $materials[$data[$i + 1]] = intval($data[$i]);

        if (isset($materials['shards']) && $materials['shards'] >= 250) {
            $materials['shards'] -= 250;
            $isObtained = true;
            echo 'Shadowmourne obtained!', PHP_EOL;
            break;
        } else if (isset($materials['fragments']) && $materials['fragments'] >= 250){
            $materials['fragments'] -= 250;
            $isObtained = true;
            echo 'Valanyr obtained!', PHP_EOL;
            break;
        } else if (isset($materials['motes']) && $materials['motes'] >= 250){
            $materials['motes'] -= 250;
            $isObtained = true;
            echo 'Dragonwrath obtained!', PHP_EOL;
            break;
        }
    }

    if ($isObtained) break;
}

$keyMaterials = array_filter($materials, function($key){
    return $key == 'shards' || $key == 'fragments' || $key == 'motes';
}, ARRAY_FILTER_USE_KEY);

$junkMaterials = array_filter($materials, function($key){
    return $key != 'shards' && $key != 'fragments' && $key != 'motes';
}, ARRAY_FILTER_USE_KEY);

uksort($keyMaterials, function($keyA, $keyB) use($keyMaterials){
    if ($keyMaterials[$keyA] == $keyMaterials[$keyB]) return $keyA <=> $keyB;
    else return $keyMaterials[$keyB] <=> $keyMaterials[$keyA];
});

uksort($junkMaterials, function($keyA, $keyB) {
    return $keyA <=> $keyB;
});

foreach ($keyMaterials as $key => $value) {
    echo "$key: $value", PHP_EOL;
}

foreach ($junkMaterials as $key => $value) {
    echo "$key: $value", PHP_EOL;
}
?>