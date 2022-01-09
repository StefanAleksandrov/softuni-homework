<?php
function middleCharacter($string){
    $limit = strlen($string);

    if ($limit % 2 == 1){
        echo $string[($limit - 1) / 2];
    } else {
        echo $string[($limit / 2) - 1], $string[$limit / 2];
    }
}

echo middleCharacter(readline());
?>