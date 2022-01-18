<?php
$input = readline();
$limit = strlen($input);
$output = '';

for ($i = 0; $i < $limit; $i++) { 
    $char = $input[$i];
    if ($char !== substr($output, -1)) $output .= $char;
}

echo $output;
?>