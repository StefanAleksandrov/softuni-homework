<?php
$inputNeedle = readline();
$inputStr = readline();

while(strpos($inputStr, $inputNeedle) !== false){
    $inputStr = str_replace($inputNeedle, '', $inputStr);
}

echo $inputStr;
?>