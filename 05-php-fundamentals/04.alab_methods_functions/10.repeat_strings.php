<?php
function repeatStrings($string, $repeatTimes){
    return str_repeat($string, $repeatTimes);
}

$string = readline();
$repeatTimes = intval(readline());

echo repeatStrings($string, $repeatTimes);
?>