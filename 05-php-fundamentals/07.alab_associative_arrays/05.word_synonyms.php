<?php
$synonymsCount = intval(readline());
$output = [];

for ($i = 0; $i < $synonymsCount; $i++) { 
    $word = readline();
    $synonym = readline();

    if (isset($output[$word])) $output[$word][] = $synonym;
    else $output[$word] = [$synonym];
}

uksort($output, function($keyA, $keyB) use($output) {
    if (count($output[$keyB]) == count($output[$keyA])) return $keyA <=> $keyB;
    return count($output[$keyB]) <=> count($output[$keyA]);
});

foreach ($output as $key => $value) {
    echo "$key - " . implode(', ', $value), PHP_EOL;
}
?>