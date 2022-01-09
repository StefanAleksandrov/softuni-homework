<?php
function dataTypes($type, $number){
    switch($type){
        case 'int':
            echo floatval($number) * 2;
            break;
        case 'real':
            $res = floatval($number) * 1.5;
            echo sprintf('%.2f', $res);
            break;
        case 'string':
            echo '$' . $number . '$';
            break;
    }
}

$type = readline();
$number = readline();
dataTypes($type, $number);
?>