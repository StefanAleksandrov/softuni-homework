<?php
function vowelsCount($word){
    $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
    $limit = strlen($word);
    $vowelsCount = 0;

    for ($i = 0; $i < $limit; $i++) { 
        if (in_array($word[$i], $vowels)){
            $vowelsCount++;
        }
    }

    return $vowelsCount;
}

echo vowelsCount(readline());
?>