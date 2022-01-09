<?php

$hourInput = intval(readline());
$minuteInput = intval(readline());

$totalMinutesInput = ($hourInput * 60) + $minuteInput;
$totalMinutesOutput = $totalMinutesInput + 30;

$hourOutput = intval($totalMinutesOutput / 60);
$minuteOutput = intval($totalMinutesOutput % 60);

if ($hourOutput > 23) {
    $hourOutput -= 24;
}

if ($minuteOutput < 10) {
    $minuteOutput = '0' . $minuteOutput;
}

echo "$hourOutput:$minuteOutput";

?>