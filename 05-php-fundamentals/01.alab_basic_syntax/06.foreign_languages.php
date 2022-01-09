<?php

$countryInput = readline();

switch ($countryInput) {
    case 'USA':
    case 'England':
        $language = 'English';
        break;
    
    case 'Spain':
    case 'Argentina':
    case 'Mexico':
        $language = 'Spanish';
        break;
    
    default:
        $language = 'unknown';
        break;
}

echo $language;

?>