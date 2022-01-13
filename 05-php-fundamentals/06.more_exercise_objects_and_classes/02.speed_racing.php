<?php
class Car {
    private $model;
    private $fuel;
    private $consumption;
    private $distance;
    public function __construct(string $model, string $fuel, string $consumption){
        $this->model = $model;
        $this->fuel = floatval($fuel);
        $this->consumption = floatval($consumption);
        $this->distance = 0;
    }
    public function getModel(){
        return $this->model;
    }
    public function travel($distance){
        $requiredFuel = $this->consumption * $distance;

        if ($this->fuel < $requiredFuel){
            echo 'Insufficient fuel for the drive', PHP_EOL;
        } else {
            $this->fuel -= $requiredFuel;
            $this->distance += $distance;
        }
    }
    public function __toString(){
        return sprintf('%s %.2f %.0f', $this->model, $this->fuel, $this->distance);
    }
}

$carsNumber = intval(readline());
$carsList = [];

for ($i = 0; $i < $carsNumber; $i++) { 
    $carsList[] = new Car(...explode(' ', readline()));
}

$command = readline();

while ($command != 'End') {
    $data = explode(' ', $command);

    foreach ($carsList as $car) {
        if ($car->getModel() == $data[1]){
            $car->travel($data[2]);
        }
    }

    $command = readline();
}

foreach ($carsList as $car) {
    echo $car, PHP_EOL;
}
?>