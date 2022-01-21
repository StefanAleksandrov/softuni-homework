<?php
$regex = '/(^|(?<=\s{1}))(?<user>[a-z]+[\w\d.\-_]+[\w])@(?<host>[\w][\w.-]+\.[\w]+)\b/';
$string = readline();
$matches = [];
preg_match_all($regex, $string, $matches);

foreach ($matches[0] as $match) {
    if ($match) echo $match, PHP_EOL;
}
?>