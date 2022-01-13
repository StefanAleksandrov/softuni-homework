<?php
class Employee {
    private $name;
    private $salary;
    public function __construct(string $name, string $salary){
        $this->name = $name;
        $this->salary = floatval($salary);
    }
    public function getName(){
        return $this->name;
    }
    public function getSalary(){
        return $this->salary;
    }
}
class Department {
    private $name;
    public $employeesList;
    private $salariesList;
    public function __construct(string $name){
        $this->name = $name;
        $this->employeesList = [];
    }
    public function getName(){
        return $this->name;
    }
    public function addEmployee(Employee $employee){
        $this->employeesList[] = $employee;
        $this->salariesList[] = $employee->getSalary();
    }
    public function getAverageSalary(){
        return array_sum($this->salariesList) / count($this->salariesList);
    }
    public function __toString(){
        $result = "Highest Average Salary: {$this->getName()}";

        usort($this->employeesList, function($emplA, $emplB){
            return $emplB->getSalary() <=> $emplA->getSalary();
        });

        foreach ($this->employeesList as $employee) {
            $result .= "\n" . sprintf('%s %.2f', $employee->getName(), $employee->getSalary());
        }

        return $result;
    }
}

function findDepartment ($name, $departmentsList){
    foreach ($departmentsList as $element){
        if ($name == $element->getName()) return $element;
    }

    return false;
}

$departmentsList = [];
$limit = intval(readline());

for ($i = 0; $i < $limit; $i++) { 
    $data = explode(' ', readline());
    $newEmployee = new Employee($data[0], $data[1]);
    $department = findDepartment($data[2], $departmentsList);

    if ($department !== false){
        $department->addEmployee($newEmployee);
    } else {
        $newDepartment = new Department($data[2]);
        $newDepartment->addEmployee($newEmployee);
        $departmentsList[] = $newDepartment;
    }
}

uksort($departmentsList, function($keyA, $keyB) use($departmentsList){
    return $departmentsList[$keyB]->getAverageSalary() <=> $departmentsList[$keyA]->getAverageSalary();
});

echo array_shift($departmentsList);
?>