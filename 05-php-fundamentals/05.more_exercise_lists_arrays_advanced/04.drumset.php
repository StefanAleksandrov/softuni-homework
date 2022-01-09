<?php
$savings = floatval(readline());
$drumsArrOG = array_map('intval', explode(' ', readline()));
$drumsArr = array_slice($drumsArrOG, 0);
$command = readline();

while($command != 'Hit it again, Gabsy!'){
    $drumsArr = array_map(function($element, $index) use ($command, $drumsArrOG){
        if($element == 'REMOVE') return $element;

        $element -= intval($command);

        if($element <= 0){
            $originalDrum = $drumsArrOG[$index];
            $price = $originalDrum * 3;
            
            if($savings >= $price){
                $savings -= $price;
                $element = $originalDrum;
            } else {
                $element = 'REMOVE';
            }
        }

        return $element;
    }, $drumsArr, array_keys($drumsArr));

    $command = readline();
}

$drumsArr = array_diff($drumsArr, ['REMOVE']);

echo implode(' ', $drumsArr), PHP_EOL;
echo sprintf('Gabsy has %.2flv.', $savings);
?>