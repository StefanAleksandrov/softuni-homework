<?php
class Product {
    private $name;
    private $cost;
    public function __construct(string $name, string $cost){
        $this->name = $name;
        $this->cost = intval($cost);
    }
    public function getName(){
        return $this->name;
    }
    public function getCost(){
        return $this->cost;
    }
    public function __toString(){
        return $this->name;
    }
}
class Person {
    private $name;
    private $balance;
    private $products;
    public function __construct(string $name, string $balance){
        $this->name = $name;
        $this->balance = floatval($balance);
        $this->products = [];
    }
    public function getName(){
        return $this->name;
    }
    public function getProducts(){
        return $this->products;
    }
    public function purchase(Product $product){
        if ($this->balance < $product->getCost()){
            echo "{$this->name} can't afford {$product->getName()}", PHP_EOL;
        } else {
            $this->balance -= $product->getCost();
            $this->products[] = $product;
            echo "{$this->name} bought {$product->getName()}", PHP_EOL;
        }
    }
    public function __toString(){
        if (count($this->products) > 0) return "{$this->name} - " . implode(', ', $this->products);
        else return "{$this->name} - Nothing bought";
    }
}

$inputPeople = explode(';', readline());
$inputProducts = explode(';', readline());
$peopleList = [];
$productsList = [];

foreach ($inputProducts as $product){
    if ($product && strlen($product) > 0) $productsList[] = new Product(...explode('=', $product));
}

foreach ($inputPeople as $person){
    if ($person && strlen($person) > 0) $peopleList[] = new Person(...explode('=', $person));
}

$command = readline();

while ($command != 'END'){
    $data = explode(' ', $command);

    foreach ($peopleList as $person) {
        if ($person->getName() == $data[0]){
            foreach ($productsList as $product) {
                if ($product->getName() == $data[1]){
                    $person->purchase($product);
                }
            }
        }
    }

    $command = readline();
}

foreach ($peopleList as $person) {
    echo $person, PHP_EOL;
}
?>