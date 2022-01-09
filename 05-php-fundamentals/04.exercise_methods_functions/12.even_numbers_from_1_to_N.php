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
$inputNumber = $_GET['num'];

if (isset($inputNumber)){
    $output = '';
    
    for ($i = 2; $i <= $inputNumber ; $i += 2) { 
        $output = $output . $i . ' ';
    }
    
    echo $output;
}
?>
</body>
</html>
