<?php
$inputExample = [
    '4',
    'Gold Zzazx null 1000 10',
    'Gold Traxx 500 null 0',
    'Gold Xaarxx 250 1000 null',
    'Gold Ardrax 100 1055 50',
];
$limit = intval(readline());
$dragonsList = [];

for ($i = 0; $i < $limit; $i++) { 
    $data = explode(' ', readline());
    $damage = intval($data[2] != 'null' ? $data[2] : 45);
    $health = intval($data[3] != 'null' ? $data[3] : 250);
    $armor = intval($data[4] != 'null' ? $data[4] : 10);

    if (!isset($dragonsList[$data[0]])){
        $dragonsList[$data[0]] = [
            $data[1] => "damage: {$damage}, health: {$health}, armor: {$armor}",
            'totalDmg' => $damage,
            'totalHealth' => $health,
            'totalArmor' => $armor,
            'dragonsCount' => 1
        ];
    } else if (isset($dragonsList[$data[0]]) && !isset($dragonsList[$data[0]][$data[1]])){
        $dragonsList[$data[0]][$data[1]] = "damage: {$damage}, health: {$health}, armor: {$armor}";
        $dragonsList[$data[0]]['totalDmg'] += $damage;
        $dragonsList[$data[0]]['totalHealth'] += $health;
        $dragonsList[$data[0]]['totalArmor'] += $armor;
        $dragonsList[$data[0]]['dragonsCount'] += 1;
    } else if (isset($dragonsList[$data[0]]) && isset($dragonsList[$data[0]][$data[1]])){
        $oldValues = explode(', ', $dragonsList[$data[0]][$data[1]]);
        $oldDmg = intval(explode(': ', $oldValues[0])[1]);
        $oldHealth = intval(explode(': ', $oldValues[1])[1]);
        $oldArmor = intval(explode(': ', $oldValues[2])[1]);
        $dragonsList[$data[0]][$data[1]] = "damage: {$damage}, health: {$health}, armor: {$armor}";
        $dragonsList[$data[0]]['totalDmg'] += $damage - $oldDmg;
        $dragonsList[$data[0]]['totalHealth'] += $health - $oldHealth;
        $dragonsList[$data[0]]['totalArmor'] += $armor - $oldArmor;
    }
}

foreach ($dragonsList as $type => $dragons) {
    $avgDmg = number_format($dragonsList[$type]['totalDmg'] / $dragonsList[$type]['dragonsCount'], 2, '.', '');
    $avgHealth = number_format($dragonsList[$type]['totalHealth'] / $dragonsList[$type]['dragonsCount'], 2, '.', '');
    $avgArmor = number_format($dragonsList[$type]['totalArmor'] / $dragonsList[$type]['dragonsCount'], 2, '.', '');
    echo "{$type}::({$avgDmg}/{$avgHealth}/{$avgArmor})", PHP_EOL;

    uksort($dragons, function($keyA, $keyB){
        return $keyA <=> $keyB;
    });

    foreach ($dragons as $name => $stats) {
        if ($name != 'totalDmg' && $name != 'totalHealth' && $name != 'totalArmor' && $name != 'dragonsCount') echo "-{$name} -> {$stats}", PHP_EOL;
    }
}
?>