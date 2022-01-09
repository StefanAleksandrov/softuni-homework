<?php

// $radius = floatval(readline());
$radius = 2.5;
$piValue = floatval(pi());
$circleArea = $radius * $radius * $piValue;
echo sprintf('%.12f', $circleArea);

?>