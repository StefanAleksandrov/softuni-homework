<?php
$example = [
    '3',
    "tt(''DGsvywgerx>6444444444%H%1B9444",
    'GQhrr|A977777(H(TTTT',
    'EHfsytsnhf?8555&I&2C9555SR',
];
$limit = intval(readline());
$regexKey = '/[starSTAR]/';
$regex = '/@(?<planet>[A-Za-z]+)([^@,^\-,^!,^:,^>]*):(?<population>[0-9]+)([^@,^\-,^!,^:,^>]*)!(?<type>[AD]{1})!([^@,^\-,^!,^:,^>]*)->(?<soldiers>[0-9]+)/';
$planets = [
    'attacked' => [],
    'destroyed' => []
];

for ($i = 0; $i < $limit; $i++) { 
    $command = readline();
    $matchesKey = [];
    preg_match_all($regexKey, $command, $matchesKey);
    $key = count($matchesKey[0]);
    $commandLength = strlen($command);
    $decryptedMsg = '';

    for ($j = 0; $j < $commandLength; $j++) { 
        $decryptedMsg .= chr(ord($command[$j]) - $key);
    }

    $matches = [];
    preg_match_all($regex, $decryptedMsg, $matches);

    if (count($matches[0]) > 0){
        if ($matches['type'][0] == 'A'){
            $planets['attacked'][] = $matches['planet'][0];
        } else if ($matches['type'][0] == 'D'){
            $planets['destroyed'][] = $matches['planet'][0];
        }
    }
}

$attackedPlanetsCount = count($planets['attacked']);
$destroyedPlanetsCount = count($planets['destroyed']);
echo "Attacked planets: {$attackedPlanetsCount}", PHP_EOL;

if ($attackedPlanetsCount > 0){
    sort($planets['attacked']);
    foreach ($planets['attacked'] as $planet) {
        echo "-> {$planet}", PHP_EOL;
    }
}

echo "Destroyed planets: {$destroyedPlanetsCount}", PHP_EOL;

if ($destroyedPlanetsCount > 0){
    sort($planets['destroyed']);
    foreach ($planets['destroyed'] as $planet) {
        echo "-> {$planet}", PHP_EOL;
    }
}
?>