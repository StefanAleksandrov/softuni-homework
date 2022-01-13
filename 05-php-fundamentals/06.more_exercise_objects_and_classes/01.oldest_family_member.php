<?php
class Person {
    private $name;
    private $age;
    public function __construct(string $name, string $age){
        $this->name = $name;
        $this->age = intval($age);
    }
    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
}
class Family {
    private $members;
    public function __construct(){
        $this->members = [];
    }
    public function addMember(Person $member){
        $this->members[] = $member;
    }
    public function getOldestMember(){
        if (count($this->members) < 1) return null;
        $oldest = $this->members[0];

        foreach ($this->members as $member) {
            if ($member->getAge() > $oldest->getAge()) $oldest = $member;
        }

        return $oldest;
    }
}

$family = new Family();
$peopleCount = intval(readline());

for ($i = 0; $i < $peopleCount; $i++) { 
    $newPerson = new Person(...explode(' ', readline()));
    $family->addMember($newPerson);
}

$result = $family->getOldestMember();
echo "{$result->getName()} {$result->getAge()}";
?>