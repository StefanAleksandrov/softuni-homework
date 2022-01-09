<?php
class Person {
    private $firstName;
    private $lastName;
    private $age;
    public function __construct(string $firstName = '', string $lastName = '', string $age = ''){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }
    public function setFirstName(string $input){
        $this->firstName = $input;
    }
    public function getFirstName(){
        return $this->firstName;
    }
    public function setLastName(string $input){
        $this->larstName = $input;
    }
    public function getLastName(){
        return $this->larstName;
    }
    public function setAge(string $input){
        $this->age = $input;
    }
    public function getAge(){
        return $this->age;
    }
}

$person = new Person();
$person->setFirstName(readline());
$person->setLastName(readline());
$person->setAge(readline());

echo "firstName: {$person->getFirstName()}", PHP_EOL;
echo "lastName: {$person->getLastName()}", PHP_EOL;
echo "age: {$person->getage()}", PHP_EOL;
?>