<?php

$input = readline();

while ($input != 'END'){
    if (filter_var($input, FILTER_VALIDATE_INT)) echo "$input is integer type", PHP_EOL;
    else if (filter_var($input, FILTER_VALIDATE_FLOAT)) echo "$input is floating point type", PHP_EOL;
    else if (filter_var($input, FILTER_VALIDATE_BOOLEAN) || $input === false || $input === true) echo "$input is boolean type", PHP_EOL;
    else if (strlen($input) == 1) echo "$input is character type", PHP_EOL;
    else echo "$input is string type", PHP_EOL;

    $input = readline();
}

?>