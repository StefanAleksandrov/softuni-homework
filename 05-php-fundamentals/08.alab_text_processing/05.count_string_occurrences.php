<?php
$inputString = readline();
$needle = readline();
$count = 0;
$wordDelimeters = [' ', ',', '.', '?', '!'];
$newString = str_replace($wordDelimeters, '@', $inputString);
$wordsArr = explode("@", $newString);
array_filter($wordsArr);

foreach ($wordsArr as $word) {
    if ($word == $needle) $count++;
}

echo $count;
?>