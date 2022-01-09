<?php
class Song {
    private $typeList;
    private $name;
    private $time;
    public function __construct(string $typeList, string $name, string $time){
        $this->typeList = $typeList;
        $this->name = $name;
        $this->time = $time;
    }
    public function getTypeList(){
        return $this->typeList;
    }
    public function getName(){
        return $this->name;
    }
}

$numberSongs = intval(readline());
$songs = [];;

for ($i = 0; $i < $numberSongs; $i++) { 
    $songs[] = new Song(...explode('_', readline()));
}

$typeList = readline();

if ($typeList != 'all'){
    $songs = array_filter($songs, function($song) use ($typeList){
        return $song->getTypeList() == $typeList;
    });
}

foreach ($songs as $key => $value) {
    echo $value->getName(), PHP_EOL;
}
?>