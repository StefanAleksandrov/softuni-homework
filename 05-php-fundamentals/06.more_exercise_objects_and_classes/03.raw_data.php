<?php
class Engine {
    private $speed;
    private $power;
    public function __construct(string $speed, string $power){
        $this->speed = intval($speed);
        $this->power = intval($power);
    }
    public function getPower(){
        return $this->power;
    }
}
class Cargo {
    private $weight;
    private $type;
    public function __construct(string $weight, string $type){
        $this->weight = intval($weight);
        $this->type = $type;
    }
    public function getWeight(){
        return $this->weight;
    }
    public function getType(){
        return $this->type;
    }
}
class Car {
    private $model;
    public $engine;
    public $cargo;
    public function __construct(string $model, Engine $engine, Cargo $cargo){
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
    }
    public function getModel(){
        return $this->model;
    }
    public function print($command){
        if ($command == 'fragile' && $this->cargo->getType() == $command && $this->cargo->getWeight() < 1000){
            echo $this->getModel(), PHP_EOL;

        } else if ($command == 'flamable' && $this->cargo->getType() == $command && $this->engine->getPower() > 250){
            echo $this->getModel(), PHP_EOL;
        }
    }
}

$carsNumber = intval(readline());
$carsList = [];

for ($i = 0; $i < $carsNumber; $i++) { 
    $data = explode(' ', readline());
    $newEngine = new Engine($data[1], $data[2]);
    $newCargo = new Cargo($data[3], $data[4]);
    $carsList[] = new Car($data[0], $newEngine, $newCargo);
}

$command = readline();

foreach ($carsList as $car) {
    $car->print($command);
}
?>