<?php
$example = [
    '>>Sofa<<312.23!3',
    '>>TV<<300!5',
    '>Invalid<<!5',
    'Purchase',
];
$regex = '/[>]+(?<furniture>[\w]+)[<]+(?<price>[\d]+(\.\d+)?)!(?<count>[\d]+)/';
$command = readline();
$totalSpend = 0;
echo 'Bought furniture:', PHP_EOL;

while ($command != 'Purchase'){
    $matches = [];
    preg_match($regex, $command, $matches);

    if (count($matches) > 0){
        $totalSpend += $matches['price'] * $matches['count'];
        echo $matches['furniture'], PHP_EOL;
    }

    $command = readline();
}

$totalSpend = number_format($totalSpend, 2, '.', '');
echo "Total money spend: {$totalSpend}";
?>