<?php
$example = [
    'George, Peter, Bill, Tom',
    'G4e@55or%6g6!68e!!@',
    'R1@!3a$y4456@',
    'B5@i@#123ll',
    'G@e54o$r6ge#',
    '7P%et^#e5346r',
    'T$o553m&6',
    'end of race'
];
$command = readline();
$people = explode(', ', $command);
$result = [];
$regexNumbers = '/[0-9]/';
$regexLetters = '/[A-Za-z]/';
$place = 1;

while ($command != 'end of race') {
    $letters = [];
    preg_match_all($regexLetters, $command, $letters);
    $name = implode($letters[0]);

    if (in_array($name, $people)){
        $numbers = [];
        preg_match_all($regexNumbers, $command, $numbers);
        $distance = array_sum($numbers[0]);

        if (!isset($result[$name])) $result[$name] = $distance;
        else $result[$name] += $distance;
    }

    $command = readline();
}

uksort($result, function($keyA, $keyB) use($result){
    return $result[$keyB] <=> $result[$keyA];
});

foreach ($result as $name => $dist) {
    if ($place == 1) echo "1st place: {$name}", PHP_EOL;
    else if ($place == 2) echo "2nd place: {$name}", PHP_EOL;
    else if ($place == 3) echo "3rd place: {$name}", PHP_EOL;
    else break;
    $place++;
}
?>