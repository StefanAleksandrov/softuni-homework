<?php
$example = [
    '3',
    'CNdwhamigyenumje$J$',
    'CEreelh-nmguuejn$J$',
    'CVwdq&gnmjkvng$Q$',
    'end'
];
$number = intval(readline());
$command = readline();
$decryptedMessages = '';
$regex = '/@(?<name>[A-Za-z]+)[\^]*[^\@^\-^\!^\:^\>]*[!][G][!]/';

while ($command != 'end'){
    $decrypted = '';
    $limit = strlen($command);

    for ($i = 0; $i < $limit; $i++) { 
        $decrypted .= chr(ord($command[$i]) - $number);
    }

    $decryptedMessages .= $decrypted . PHP_EOL;
    $command = readline();
}

$matches = [];
preg_match_all($regex, $decryptedMessages, $matches);

for ($i = 0; $i < count($matches[0]); $i++) { 
    echo $matches['name'][$i], PHP_EOL;
}
?>