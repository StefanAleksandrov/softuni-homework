<?php
$regex = '/\b[A-Z]{1}[a-z]+ [A-Z]{1}[a-z]+\b/m';
$string = readline();
$matches = [];
preg_match_all($regex, $string, $matches);
$resultStr = '';

foreach ($matches[0] as $match) {
    $resultStr .= "$match ";
}

echo $resultStr;
?>