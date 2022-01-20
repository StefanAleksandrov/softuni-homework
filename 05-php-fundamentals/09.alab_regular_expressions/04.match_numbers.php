<?php
$regex = '/((?<=\s)|^)[-]?[\d]+(\.\d+)?($|(?=\s))/m';
$string = readline();
$matches = [];
preg_match_all($regex, $string, $matches);
$outputList = [];

foreach ($matches[0] as $match){
    if ($match) $outputList[] = $match;
}

echo implode(' ', $outputList);
?>