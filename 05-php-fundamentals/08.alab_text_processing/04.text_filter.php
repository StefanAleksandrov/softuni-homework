<?php
$bannedWords = explode(', ', readline());
$limit = count($bannedWords);
$inputString = readline();

for ($i = 0; $i < $limit; $i++) { 
    $inputString = str_replace($bannedWords[$i], str_repeat('*', strlen($bannedWords[$i])), $inputString);
}

echo $inputString;
?>