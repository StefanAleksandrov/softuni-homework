<?php
$string = readline();
$pattern = readline();

while (true){
    $patternLength = strlen($pattern);
    $index = strpos($string, $pattern);
    $indexR = strrpos($string, $pattern);

    if (!$index || !$indexR){
        echo 'No shake.', PHP_EOL;
        echo $string;
        break;
    } else {
        echo 'Shaked it.', PHP_EOL;
        $string = substr($string, 0, $indexR) . substr($string, $indexR + $patternLength);
        $string = substr($string, 0, $index) . substr($string, $index + $patternLength);
        $indexToRemove = round($patternLength / 2, 0);
        $pattern = substr($pattern, 0, $indexToRemove - 1) . substr($pattern, $indexToRemove);

        if ($pattern == '' || $string == ''){
            echo 'No shake.', PHP_EOL;
            echo $string;
            break;
        }
    }
}
?>