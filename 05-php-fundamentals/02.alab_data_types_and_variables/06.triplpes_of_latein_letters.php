<?php

// $inputNumb = intval(readline());
$inputNumb = 3;

for ($i = 0; $i < $inputNumb; $i++) { 
    for ($j = 0; $j < $inputNumb; $j++) { 
        for ($k = 0; $k < $inputNumb; $k++) { 
            $letterOne = chr(97 + $i);
            $letterTwo = chr(97 + $j);
            $letterThree = chr(97 + $k);
            echo $letterOne;
            echo $letterTwo;
            echo $letterThree, PHP_EOL;
        }
    }
}

?>