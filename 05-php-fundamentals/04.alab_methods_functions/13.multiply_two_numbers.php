<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Form</title>

</head>
<body>
<form>
    N: <input type="text" name="num1"/>
    M: <input type="text" name="num2"/>
    <input type="submit"/>
</form>
<!--Write your PHP Script here-->
<?php
if (isset($_GET['num1']) && isset($_GET['num2'])){
    $numOne = intval($_GET['num1']);
    $numTwo = intval($_GET['num2']);
    echo $numOne * $numTwo;
}
?>
</body>
</html>
