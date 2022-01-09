<?php
$inputIndex = intval(readline()) -1;
$daysOfWeek = [
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
    'Sunday',
];

if (isset($daysOfWeek[$inputIndex])) echo $daysOfWeek[$inputIndex], PHP_EOL;
else echo 'Invalid Day!', PHP_EOL;
?>