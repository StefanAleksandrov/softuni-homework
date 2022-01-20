<?php
$regex = '/(?<day>[\d]{2})([.|\-|\/])(?<month>[A-Z][a-z]{2})(\2)(?<year>\d{4})/m';
$string = readline();
$matches = [];
preg_match_all($regex, $string, $matches);
$limit = count($matches[0]);

for ($i = 0; $i < $limit; $i++) { 
    echo "Day: {$matches['day'][$i]}, Month: {$matches['month'][$i]}, Year: {$matches['year'][$i]}", PHP_EOL;
}
?>