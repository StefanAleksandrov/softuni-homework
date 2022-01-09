<?php
function gradeCheck($grade){
    if (2 <= $grade && $grade < 3){
        echo 'Fail';
    } else if (3 <= $grade && $grade < 3.5){
        echo 'Poor';
    } else if (3.5 <= $grade && $grade < 4.5){
        echo 'Good';
    } else if (4.5 <= $grade && $grade < 5.5){
        echo 'Very good';
    } else if (5.5 <= $grade && $grade <= 6){
        echo 'Excellent';
    }
}

$inputGrade = readline();
gradeCheck($inputGrade);
?>