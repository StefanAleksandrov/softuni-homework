<?php
function printMatrix($size){
    for ($i = 0; $i < intval($size); $i++) { 
        echo trim(str_repeat("$size ", intval($size))), PHP_EOL;
    }
}

echo printMatrix(readline());
?>