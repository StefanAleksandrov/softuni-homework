<?php
class Item {
    public $name;
    public $price;
    public function __construct(string $name, string $price){
        $this->name = $name;
        $this->price = $price;
    }
}

class Box {
    public $serialNumber;
    public $item;
    public $quantity;
    public $price;
    public function __construct(string $serialNumber, Item $item, string $quantity, string $price){
        $this->serialNumber = $serialNumber;
        $this->item = $item;
        $this->quantity = $quantity;
        $this->price = $price;
    }
}

$itemBoxesList = [];
$command = readline();

while ($command != 'end') {
    $data = explode(' ', $command);
    $item = new Item($data[1], number_format($data[3], 2, '.', ''));
    $itemBoxesList[] = new Box($data[0], $item, $data[2], number_format(floatval($data[2]) * floatval($data[3]), 2, '.', ''));
    $command = readline();
}

usort($itemBoxesList, function($boxA, $boxB){
    return floatval($boxB->price) - floatval($boxA->price);
});

foreach ($itemBoxesList as $box) {
    echo "{$box->serialNumber}", PHP_EOL;
    echo "-- {$box->item->name} - \${$box->item->price}: {$box->quantity}", PHP_EOL;
    echo "-- \${$box->price}", PHP_EOL;
}
?>