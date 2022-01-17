<?php
$inputString = readline();
$wordDelimeters = [' ', ',', '.', '?', '!'];
$newString = str_replace($wordDelimeters, '@', $inputString);
$wordsArr = explode("@", $newString);
$wordsArr = array_filter($wordsArr);
natcasesort($wordsArr);
$output = [];

foreach ($wordsArr as $word) {
    $reversed = strrev($word);
    if (($reversed == $word) && !in_array($word, $output)) $output[] = $word;
}

$output = array_filter($output, function($el){
    return $el !== '';
});

$output = implode(', ', $output);
echo trim($output);
?>