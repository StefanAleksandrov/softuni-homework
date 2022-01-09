<?php
$date = readline();
$day = new DateTime($date);
echo $day->format('l');
?>