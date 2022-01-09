<?php
class Student {
    private $firstName;
    private $lastName;
    private $age;
    private $homeTown;
    public function __construct(string $firstName, string $lastName, string $age, string $homeTown){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->homeTown = $homeTown;
    }
    public function getFirstName(){
        return $this->firstName;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function getAge(){
        return $this->age;
    }
    public function getHomeTown(){
        return $this->homeTown;
    }
    public function __toString(){
        return $this->firstName.' '.$this->lastName;
    }
}

$command = readline();
$studentsList = [];

while ($command != 'end') {
    $existingStudentIndex = array_search(explode(' ', $command)[0].' '.explode(' ', $command)[1], $studentsList);

    if ($existingStudentIndex !== false){
        $studentsList[$existingStudentIndex] = new Student(...explode(' ', $command));
    } else {
        $studentsList[] = new Student(...explode(' ', $command));
    }

    $command = readline();
}

$town = readline();

if ($town && $town != 'all'){
    $studentsList = array_filter($studentsList, function($student) use($town){
        return $student->getHomeTown() == $town;
    });
}

foreach ($studentsList as $student) {
    echo "{$student->getFirstName()} {$student->getLastName()} is {$student->getAge()} years old.", PHP_EOL;
}
?>