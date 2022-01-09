<?php
$trainWagons = array_map('intval', explode(' ', readline()));
$maxCapacity = intval(readline());
$command = readline();

while($command != 'end'){
    $actionsArr = explode(' ', $command);

    switch($actionsArr[0]){
        case 'Add':
            $trainWagons[] = intval($actionsArr[1]);
            break;
        default:
            $amount = intval($actionsArr[0]);
            for ($i = 0; $i < count($trainWagons); $i++) {
                if ($trainWagons[$i] == $maxCapacity){
                    continue;
                } else if ($trainWagons[$i] + $amount <= $maxCapacity){
                    $trainWagons[$i] += $amount;
                    break;
                }
            }
    }
    
    $command = readline();
}

echo implode(' ', $trainWagons), PHP_EOL;
?>