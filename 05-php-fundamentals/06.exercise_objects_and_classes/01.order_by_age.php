<?php
class Person {
    private $name;
    private $id;
    private $age;
    public function __construct(string $name, string $id, string $age){
        $this->name = $name;
        $this->id = $id;
        $this->age = intval($age);
    }
    public function getAge(){
        return $this->age;
    }
    public function toString(){
        return "{$this->name} with ID: {$this->id} is {$this->age} years old.";
    }
}

class PeopleCollection {
    private $collection;
    public function __construct(){
        $this->collection = [];
    }
    public function addPerson(Person $person){
        $this->collection[] = $person;
    }
    public function printOut(){
        usort($this->collection, function($personA, $personB){
            return $personA->getAge() - $personB->getAge();
        });
        foreach ($this->collection as $person) {
            echo $person->toString(), PHP_EOL;
        }
    }
}

$collection = new PeopleCollection();
$command = readline();

while ($command !== 'End'){
    $person = new Person (...explode(' ', $command));
    $collection->addPerson($person);
    $command = readline();
}

$collection->printOut();
?>