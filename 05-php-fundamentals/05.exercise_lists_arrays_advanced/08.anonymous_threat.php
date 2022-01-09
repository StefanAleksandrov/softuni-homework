<?php
$inputArr = array_map('trim' ,explode(' ', readline()));
$command = readline();
$commandsArr = [
    'merge 4 10' => 'divide 4 3',
    'divide 4 3' => '3:1'
];

while($command != '3:1'){
    $actionArr = explode(' ', $command);

    switch ($actionArr[0]) {
        case 'merge':
            $startIndex = min(count($inputArr) - 1, max(0, intval($actionArr[1])));
            $endIndex = max(0, min(count($inputArr) - 1, intval($actionArr[2])));
            $mergedElements = '';

            for ($i = $startIndex; $i <= $endIndex; $i++) { 
                $mergedElements = $mergedElements . $inputArr[$i];
            }

            array_splice($inputArr, $startIndex, $endIndex - $startIndex + 1, $mergedElements);
            break;
        case 'divide':
            $index = min(count($inputArr) - 1, max(0, intval($actionArr[1])));
            $elementsCount = intval($actionArr[2]);
            $newElements = [];
            $start = 0;

            for ($i = 0; $i < $elementsCount; $i++) {
                if ($i < $elementsCount - 1){
                    $length = floor(strlen($inputArr[$index]) / $elementsCount);
                } else {
                    $length = ceil(strlen($inputArr[$index]) / $elementsCount);
                }

                $newElements[] = substr($inputArr[$index], $start, $length);
                $start += $length;
            }

            array_splice($inputArr, $index, 1, $newElements);
            break;
    }
    $command = readline();
}

echo implode(' ', array_map('trim' ,$inputArr));
?>