<?php
$regex = '/^|[\W]?\+359([ -]{1})2(\1)[0-9]{3}(\1)[0-9]{4}\b/m';
$string = readline();
$matches = [];
preg_match_all($regex, $string, $matches);
$outputList = [];

foreach ($matches[0] as $match) {
    if ($match != '') $outputList[] = trim($match);
}

echo implode(', ', $outputList);
?>