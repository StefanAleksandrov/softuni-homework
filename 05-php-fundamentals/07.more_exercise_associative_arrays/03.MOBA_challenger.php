<?php
$inputExample = [
    'Pesho -> Adc -> 400',
    'Bush -> Tank -> 150',
    'Faker -> Mid -> 200',
    'Faker -> Support -> 250',
    'Faker -> Tank -> 250',
    'Pesho vs Faker',
    'Faker vs Bush',
    'Faker vs Hide',
    'Season end'
];
$command = readline();
$league = [];

while ($command != 'Season end'){
    if (strpos($command, ' -> ')){
        addSkill($command, $league);
    } else if (strpos($command, ' vs ')){
        duel($command, $league);
    }

    $command = readline();
}

function addSkill($command, &$league){
    $data = explode(' -> ', $command);
    if (!isset($league[$data[0]])){
        $league[$data[0]] = [$data[1] => intval($data[2])];
    } else {
        $hasSkill = false;

        foreach ($league[$data[0]] as $skillName => $skillValue){
            if ($data[1] == $skillName){
                $hasSkill = true;

                if ($skillValue < intval($data[2])) $league[$data[0]][$skillName] = intval($data[2]);
            }
        }

        if (!$hasSkill) $league[$data[0]][$data[1]] = intval($data[2]);
    }
}
function duel($command, &$league){
    $players = explode(' vs ', $command);
    $playerA = null;
    $playerB = null;

    foreach ($league as $key => $value) {
        if ($key == $players [0]) $playerA = [$key => $value];
        else if ($key == $players[1]) $playerB = [$key => $value];
    }

    if ($playerA && $playerB){
        $hasCommonSkill = false;

        foreach ($playerA[$players[0]] as $keyA => $skillsA) {
            foreach ($playerB[$players[1]] as $keyB => $skillsB) {
                if ($keyA == $keyB) $hasCommonSkill = true; break;
            }
            if ($hasCommonSkill) break;
        }

        if ($hasCommonSkill){
            $totalSkillsA = getTotalSkill($playerA[$players[0]]);
            $totalSkillsB = getTotalSkill($playerB[$players[1]]);
            if ($totalSkillsA > $totalSkillsB) unset($league[$players[1]]);
            else if ($totalSkillsA < $totalSkillsB) unset($league[$players[0]]);
        }
    }
}
function getTotalSkill($skills){
    $sum = 0;
    foreach ($skills as $value){
        $sum += $value;
    }
    return $sum;
}

uasort($league, function($elA, $elB){
    return getTotalSkill($elB) <=> getTotalSkill($elA);
});

foreach ($league as $key => $value){
    $totalSkill = getTotalSkill($value);
    echo "$key: $totalSkill skill", PHP_EOL;

    uksort($value, function($keyA, $keyB) use($value){
        if ($value[$keyA] == $value[$keyB]) return $keyA <=> $keyB;
        return $value[$keyB] <=> $value[$keyA];
    });

    foreach($value as $skillName => $skillValue){
        echo "- $skillName <::> $skillValue", PHP_EOL;
    }
}
?>