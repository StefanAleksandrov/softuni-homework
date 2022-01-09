<?php
$fieldSize = intval(readline());
$ladybugsIndexes = explode(' ', readline());
$ladybugs = [];
$command = readline();

for ($i = 0; $i < $fieldSize; $i++) { 
    if (in_array($i, $ladybugsIndexes)){
        $ladybugs[$i] = 1;
    } else {
        $ladybugs[$i] = 0;
    }
}

while($command != 'end'){
    $arrayCommands = explode(' ', $command);

    if(isset($ladybugs[$arrayCommands[0]]) && $ladybugs[$arrayCommands[0]] == 1){
        switch($arrayCommands[1]){
            case 'left':
                $newIndex = $arrayCommands[0] - $arrayCommands[2];
                $ladybugs[$arrayCommands[0]] = 0;

                if(isset($ladybugs[$newIndex])){
                    while(isset($ladybugs[$newIndex]) && $ladybugs[$newIndex] == 1){
                        $newIndex -= $arrayCommands[2];
                    }

                    if(isset($ladybugs[$newIndex]) && $ladybugs[$newIndex] == 0){
                        $ladybugs[$newIndex] = 1;
                    }
                }

                break;
            case 'right':
                $newIndex = $arrayCommands[0] + $arrayCommands[2];
                $ladybugs[$arrayCommands[0]] = 0;

                if(isset($ladybugs[$newIndex])){
                    while(isset($ladybugs[$newIndex]) && $ladybugs[$newIndex] == 1){
                        $newIndex += $arrayCommands[2];
                    }

                    if(isset($ladybugs[$newIndex]) && $ladybugs[$newIndex] == 0){
                        $ladybugs[$newIndex] = 1;
                    }
                }

                break;
            default: break;
        }
    }

    $command = readline();
}

echo implode(' ', $ladybugs);
?>