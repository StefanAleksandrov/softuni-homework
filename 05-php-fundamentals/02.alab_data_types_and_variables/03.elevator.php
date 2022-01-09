<?php

// $peopleCount = intval(readline());
// $elevetaroCapacity = intval(readline());
$peopleCount = 10;
$elevetaroCapacity = 5;

if ($peopleCount <= $elevetaroCapacity) {
    echo 'All the persons fit inside in the elevator.', PHP_EOL;
    echo 'Only one course is needed.';
} else {
    $courses = floor($peopleCount / $elevetaroCapacity);
    $lastCourse = $peopleCount % $elevetaroCapacity;

    echo "$courses courses * $elevetaroCapacity people", PHP_EOL;

    if ($lastCourse > 0){
        echo "+ 1 course * $lastCourse persons";
    }
}

?>


<!-- For judje: -->
<?php
$peopleCount = intval(readline());
$elevetaroCapacity = intval(readline());
$courses = ceil($peopleCount / $elevetaroCapacity);
echo $courses;
?>