<?php
$command = readline();
$output = [];

while ($command != 'end') {
    $char = explode(':', $command)[0];
    $indexes = explode('/', explode(':', $command)[1]);
    
    foreach ($indexes as $index) {
        $output[$index] = $char;
    }
    
    $command = readline();
}

uksort($output, function($keyA, $keyB){
    return $keyA <=> $keyB;
});

echo implode('', $output);
?>