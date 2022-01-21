<?php
$example = [
    '%InvalidName%<Croissant>|2|10.3$',
    '%Peter%<Gum>1.3$',
    '%Maria%<Cola>|1|2.4',
    '%Valid%<Valid>valid|10|valid20$',
    'end of shift'
];
$command = readline();
$fullString = '';
$regex = '/%(?<name>[A-Z][a-z]+)%[^|^$^%^.]*\<(?<product>[\w]+)>[^|^$^%^.]*[|]{1}(?<count>[0-9]+)[|]{1}[^|,^$,^%,^.,^0-9]*(?<price>[0-9]+[.]?[0-9]*)[$]{1}/';
$totalSum = 0;
$matches = [];

while ($command != 'end of shift') {
    $fullString .= $command . PHP_EOL;
    $command = readline();
}

preg_match_all($regex, $fullString, $matches);

for ($i = 0; $i < count($matches[0]); $i++) { 
    $total = $matches['count'][$i] * $matches['price'][$i];
    $totalSum += $total;
    $total = number_format($total, 2, '.', '');
    echo "{$matches['name'][$i]}: {$matches['product'][$i]} - {$total}", PHP_EOL;
}

$totalSum = number_format($totalSum, 2, '.', '');
echo "Total income: {$totalSum}";
?>