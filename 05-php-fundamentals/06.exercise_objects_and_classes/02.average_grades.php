<?php
class Student {
    private $name;
    private $grades;
    public function __construct(string $name){
        $this->name = $name;
        $this->grades = [];
    }
    public function getName(){
        return $this->name;
    }
    public function addGrade(string $grade){
        $this->grades[] = floatval($grade);
    }
    public function averageGrade(){
        return array_sum($this->grades) / count($this->grades);
    }
    public function toString(){
        return sprintf('%s -> %.2f', $this->name, $this->averageGrade());
    }
}

$studentsCount = intval(readline());
$studentsCollection = [];

for ($i = 0; $i < $studentsCount; $i++) { 
    $data = explode(' ', readline());
    $name = array_shift($data);
    $student = new Student($name);

    foreach ($data as $grade) {
        $student->addGrade($grade);
    }

    $studentsCollection[] = $student;
}

$studentsCollection = array_filter($studentsCollection, function($student){
    return $student->averageGrade() >= 5;
});

usort($studentsCollection, function($studentA, $studentB){
    $nameCompared = strcmp($studentA->getName(), $studentB->getName());
    if ($nameCompared == 0) return $studentB->averageGrade() - $studentA->averageGrade() < 0 ? -1 : 1;
    else return $nameCompared;
});

foreach ($studentsCollection as $student) {
    echo $student->toString(), PHP_EOL;
}
?>