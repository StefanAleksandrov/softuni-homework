<?php
class Truck {
    public $brand;
    public $model;
    public $weight;
    public function __construct(string $brand, string $model, string $weight){
        $this->brand = $brand;
        $this->model = $model;
        $this->weight = $weight;
    }
}
class Car {
    public $brand;
    public $model;
    public $horsePower;
    public function __construct(string $brand, string $model, string $horsePower){
        $this->brand = $brand;
        $this->model = $model;
        $this->horsePower = $horsePower;
    }
}
class Catalogue {
    public $trucksCollection;
    public $carsCollection;
    public function __construct(){
        $this->trucksCollection = [];
        $this->carsCollection = [];
    }
    public function addTruck ($truck){
        $this->trucksCollection[] = $truck;
    }
    public function addCar ($car){
        $this->carsCollection[] = $car;
    }
    public function printTrucks(){
        usort($this->trucksCollection, function($truckA, $truckB){
            return strcmp($truckA->brand, $truckB->brand);
        });

        foreach ($this->trucksCollection as $truck) {
            echo "{$truck->brand}: {$truck->model} - {$truck->weight}kg", PHP_EOL;
        }
    }
    public function printCars(){
        usort($this->carsCollection, function($carA, $carB){
            return strcmp($carA->brand, $carB->brand);
        });

        foreach ($this->carsCollection as $car) {
            echo "{$car->brand}: {$car->model} - {$car->horsePower}hp", PHP_EOL;
        }
    }
}

$catalogue = new Catalogue();
$command = readline();

while ($command !== 'end'){
    $data = explode('/', $command);

    if ($data[0] == 'Car'){
        $catalogue->addCar(new Car($data[1], $data[2], $data[3]));
    } else {
        $catalogue->addTruck(new Truck($data[1], $data[2], $data[3]));
    }

    $command = readline();
}

echo 'Cars:', PHP_EOL;
$catalogue->printCars();
echo 'Trucks:', PHP_EOL;
$catalogue->printTrucks();
?>