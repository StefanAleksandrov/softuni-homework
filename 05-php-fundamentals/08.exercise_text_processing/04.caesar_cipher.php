<?php
$input = readline();
$limit = strlen($input);
$output = '';

for ($i = 0; $i < $limit; $i++) { 
    $output .= chr(ord($input[$i]) + 3);
}

echo $output;
?>