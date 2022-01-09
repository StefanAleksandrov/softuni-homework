<?php
function factorial($number){
    $result = 1;

    while($number){
        $result = bcmul($result, $number);
        $number--;
    }

    return $result;
}

$number = intval(readline());

echo factorial($number);
?>