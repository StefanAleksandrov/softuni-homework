<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Form</title>

</head>
<body>
<form>
    N: <input type="text" name="num" />
    <input type="submit" />
</form>
<!--Write your PHP Script here-->
<?php
function is_prime($number){
    $isPrime = true;

    for ($i = $number - 1; $i >= 1; $i--) { 
        $result = $number / $i;

        if ($result == intval($result) && $i != 1){
            $isPrime = false;
            break;
        }
    }

    return $isPrime;
}

if (isset($_GET['num'])){
    $inputNumber = intval($_GET['num']);
    $output = '';

    for ($i = $inputNumber; $i > 1; $i--) { 
        if (is_prime($i)) $output = $output . $i . ' ';
    }

    echo $output;
}
?>
</body>
</html>
