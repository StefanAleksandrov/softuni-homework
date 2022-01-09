<?php
$inputArray = array_map('intval', explode(' ', readline()));
$command = readline();

while($command != 'end'){
    $explodedCommand = explode(' ', $command);
    $action = $explodedCommand[0];

    switch($action){
        case 'Add':
            $number = intval($explodedCommand[1]);
            array_push($inputArray, $number);
            break;
        case 'Remove':
            $number = intval($explodedCommand[1]);
            $index = array_search($number, $inputArray);
            array_splice($inputArray, $index, 1);
            break;
        case 'RemoveAt':
            $number = intval($explodedCommand[1]);
            array_splice($inputArray, $number, 1);
            break;
        case 'Insert':
            $number = intval($explodedCommand[1]);
            $index = intval($explodedCommand[2]);
            array_splice($inputArray, $index, 0, $number);
            break;
        case 'Contains':
            $number = intval($explodedCommand[1]);
            if (in_array($number, $inputArray)){
                echo 'Yes', PHP_EOL;
            } else {
                echo 'No such number', PHP_EOL;
            }
            break;
        case 'Print':
            $number = $explodedCommand[1] == 'even' ? 0 : 1;
            $outputString = '';

            foreach ($inputArray as $value) {
                if ($value % 2 == $number) $outputString = $outputString . $value . ' ';
            }

            echo $outputString, PHP_EOL;
            break;
        case 'Get':
            echo array_sum($inputArray), PHP_EOL;
            break;
        case 'Filter':
            $condition = $explodedCommand[1];
            $number = intval($explodedCommand[2]);

            switch($condition){
                case '>':
                    echo implode(' ', array_filter($inputArray, function($el) use ($number){
                        if ($el > $number) return true;
                        else return false;
                    })), PHP_EOL;
                    break;
                case '>=':
                    echo implode(' ', array_filter($inputArray, function($el) use ($number){
                        if ($el >= $number) return true;
                        else return false;
                    })), PHP_EOL;
                    break;
                case '<':
                    echo implode(' ', array_filter($inputArray, function($el) use ($number){
                        if ($el < $number) return true;
                        else return false;
                    })), PHP_EOL;
                    break;
                case '<=':
                    echo implode(' ', array_filter($inputArray, function($el) use ($number){
                        if ($el <= $number) return true;
                        else return false;
                    })), PHP_EOL;
                    break;
            }

            break;
    }

    $command = readline();
}

echo implode(' ', $inputArray);
?>