<?php

$age = intval(readline());

switch(true){
    case (0 <= $age && $age <= 2):
        echo 'baby';
        break;
    case (2 < $age && $age <= 13):
        echo 'child';
        break;
    case (13 < $age && $age <= 19):
        echo 'teenager';
        break;
    case (19 < $age && $age <= 65):
        echo 'adult';
        break;
    case (65 < $age):
        echo 'elder';
        break;
}

?>