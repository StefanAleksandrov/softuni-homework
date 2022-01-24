<?php
$demonsListInput = array_map(function($el){
    return trim($el);
}, explode(',', readline()));
$healthRegex = '/[A-Za-z]/';
$damageRegex = '/[+-]{0,1}(?:\d+(?:\.\d*)?|\.\d+)/';
$dmeonsList = [];

foreach ($demonsListInput as $demon) {
    $healthMatches = [];
    preg_match_all($healthRegex, $demon, $healthMatches);
    $health = 0;
    $damageMatches = [];
    preg_match_all($damageRegex, $demon, $damageMatches);
    $damage = 0;
    $limit = strlen($demon);

    foreach ($healthMatches[0] as $value) {
        $health += ord($value);
    }

    foreach ($damageMatches[0] as $value) {
        $damage += floatval($value);
    }

    for ($i = 0; $i < $limit; $i++) { 
        if ($demon[$i] == '*') $damage *= 2;
        else if ($demon[$i] == '/') $damage /= 2;
    }

    $damage = number_format($damage, 2, '.', '');
    $demonsList[] = "{$demon} - {$health} health, {$damage} damage";
}

sort($demonsList);

foreach ($demonsList as $demon) {
    echo $demon, PHP_EOL;
}
?>