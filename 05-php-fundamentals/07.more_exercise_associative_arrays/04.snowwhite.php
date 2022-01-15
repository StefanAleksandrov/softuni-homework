<?php
$exampleInput = [
    'Pesho <:> Red <:> 2000',
    'Tosho <:> Blue <:> 1000',
    'Gosho <:> Green <:> 1000',
    'Sasho <:> Yellow <:> 4500',
    'Prakasho <:> Stamat <:> 1000',
    'Once upon a time',
];
$command = readline();
$dwarfsList = [];
$hatColors = [];

while ($command != 'Once upon a time') {
    $data = explode(' <:> ', $command);
    $key = "({$data[1]}) {$data[0]}";
    $value = intval($data[2]);

    if (isset($dwarfsList[$key]) && $dwarfsList[$key] < $value){
        $dwarfsList[$key] = $value;
    } else if (!isset($dwarfsList[$key])){
        $dwarfsList[$key] = $value;
        if (isset($hatColors[$data[1]])) $hatColors[$data[1]] += 1;
        else $hatColors[$data[1]] = 1;
    }
    
    $command = readline();
}

uksort($dwarfsList, function($keyA, $keyB) use($dwarfsList, $hatColors){
    $colorA = substr(explode(') ', $keyA)[0], 1);
    $colorB = substr(explode(') ', $keyB)[0], 1);
    if ($dwarfsList[$keyA] == $dwarfsList[$keyB]) return $hatColors[$colorB] <=> $hatColors[$colorA];
    else return $dwarfsList[$keyB] <=> $dwarfsList[$keyA];
});

foreach ($dwarfsList as $key => $value) {
    echo "$key <-> $value", PHP_EOL;
};
?>