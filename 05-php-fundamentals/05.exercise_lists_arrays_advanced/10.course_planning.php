<?php
$schedule = explode(', ', readline());
$arrayOfCommands = ['Swap:Arrays:Methods', 'Exercise:Databases', 'Swap:Lists:Databases', 'Insert:Arrays:0', 'course start'];
$command = readline();

while($command != 'course start'){
    $actions = explode(':', $command);

    switch ($actions[0]) {
        case 'Add':
            if(!in_array($actions[1], $schedule)) array_push($schedule, $actions[1]);
            break;
        case 'Insert':
            if(!in_array($actions[1], $schedule)) array_splice($schedule, intval($actions[2]), 0, $actions[1]);
            break;
        case 'Remove':
            if(in_array($actions[1], $schedule)){
                array_splice($schedule, array_search($actions[1], $schedule), 1);
                if(in_array($actions[1] . '-Exercise', $schedule)) array_splice($schedule, array_search($actions[1] . '-Exercise', $schedule), 1);
            }
            break;
        case 'Swap':
            $indexOne = array_search($actions[1], $schedule);
            $indexOneExercise = array_search($actions[1] . '-Exercise', $schedule);
            $indexTwo = array_search($actions[2], $schedule);
            $indexTwoExercise = array_search($actions[2] . '-Exercise', $schedule);

            if ($indexOne !== false && $indexTwo !== false){
                $schedule[$indexOne] = $actions[2];
                $schedule[$indexTwo] = $actions[1];

                if ($indexOneExercise !== false && $indexTwoExercise !== false){
                    $schedule[$indexOneExercise] = $actions[2] . '-Exercise';
                    $schedule[$indexTwoExercise] = $actions[1] . '-Exercise';
                } else if ($indexOneExercise !== false){
                    $element = array_splice($schedule, $indexOneExercise, 1)[0];
                    array_splice($schedule, $indexTwo + 1, 0, $element);
                } else if ($indexTwoExercise !== false){
                    $element = array_splice($schedule, $indexTwoExercise, 1)[0];
                    array_splice($schedule, $indexOne + 1, 0, $element);
                }
            }
            break;
        case 'Exercise':
            $lessonIndex = array_search($actions[1], $schedule);
            if($lessonIndex !== false) array_splice($schedule, $lessonIndex + 1, 0, $actions[1] . '-Exercise');
            else array_push($schedule, $actions[1], $actions[1] . '-Exercise');
            break;
    }

    $command = readline();
}

for ($i = 0; $i < count($schedule); $i++) { 
    echo $i + 1 . '.' . $schedule[$i], PHP_EOL;
}
?>