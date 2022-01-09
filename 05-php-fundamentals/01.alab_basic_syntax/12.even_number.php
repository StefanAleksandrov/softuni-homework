<?php

while (true) {
    $numberInput = abs(intval(readline()));

    if ($numberInput % 2 == 0){
        echo "The number is: $numberInput";
        break;
    } else {
        echo 'Please write an even number.', PHP_EOL;
        continue;
    }
}

?>