<?php
$usernamesList = explode(', ', readline());
$validUsernamesList = [];

foreach ($usernamesList as $username) {
    $isValid = checkValidUsername($username);
    if ($isValid) $validUsernamesList[] = $username;
}

function checkValidUsername($username){
    if (strlen($username) < 3 || 16 < strlen($username)) return false;
    if (!preg_match('/^[a-zA-Z0-9_-]+$/', $username)) return false;

    return true;
}

foreach ($validUsernamesList as $username) {
    echo $username, PHP_EOL;
}
?>