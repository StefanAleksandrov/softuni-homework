<?php
$input = explode(' ', strtolower(readline()));
$limit = count($input);
$output = [];

for ($i = 0; $i < $limit; $i++) { 
    $word = $input[$i];
    if (isset($output[$word])) $output[$word] += 1;
    else $output[$word] = 1;
}

$oddWords = array_filter($output, function($element){
    return $element % 2 == 1;
});

foreach ($oddWords as $key => $value) {
    echo "$key ";
}
?>