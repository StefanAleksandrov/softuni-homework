<?php
function passwordValidator($password){
    $limit = strlen($password);
    $result = [];
    $digitsCount = 0;
    $isAlphaNumeric = true;

    if ($limit < 6 || 10 < $limit){
        $result[] = 'Password must be between 6 and 10 characters';
    }

    for ($i = 0; $i < $limit; $i++) { 
        $letter = $password[$i];
        $allowedSymbols = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'w', 'z'];

        if (intval($letter) == $letter){
            $digitsCount++;
        } else if (!in_array(strtolower($letter), $allowedSymbols)){
            $isAlphaNumeric = false;
        }
    }

    if (!$isAlphaNumeric){
        $result[] = 'Password must consist only of letters and digits';
    }

    if ($digitsCount < 2){
        $result[] = 'Password must have at least 2 digits';
    }

    return $result;
}

$passwordErorrs = passwordValidator('logIn');

if (count($passwordErorrs) == 0){
    echo 'Password is valid';
} else {
    foreach ($passwordErorrs as $err) {
        echo $err, "\n";
    }
}
?>