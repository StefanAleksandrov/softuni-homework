<?php
$arr = ['Eggs', 'StuffedAnimal', 'Cozonac', 'Sweets', 'EasterBunny', 'Eggs', 'Clothes'];

unset($arr[1]);
if (isset($arr[1])) echo 'We have an element';
else echo 'We don\'t have an element'
?>