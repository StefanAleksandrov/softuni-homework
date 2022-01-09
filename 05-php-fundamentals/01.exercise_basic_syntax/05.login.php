<?php

// $username = readline();
$username = 'Acer';
$loginAttemps = 0;

while(true){
    // $password = readline();
    $password = 'rrecA';
    $loginAttemps++;

    if($username == strrev($password)) {
        echo "User $username logged in.", PHP_EOL;
        break;
    } else if ($loginAttemps == 4) {
        echo "User $username blocked!", PHP_EOL;
        break;
    } else {
        echo 'Incorrect password. Try again.', PHP_EOL;
        continue;
    }
}

?>