<?php
class User {
    public $name;
    private $dates;
    private $comments;
    public function __construct(string $name){
        $this->name = $name;
        $this->dates = [];
        $this->comments = [];
    }
    public function getName(){
        return $this->name;
    }
    public function getDatesCount(){
        return count($this->dates);
    }
    public function addDate(string $date){
        $this->dates[] = $date;
    }
    public function addComment(string $comment){
        $this->comments[] = $comment;
    }
    public function __toString(){
        $result = "{$this->name}\nComments:";

        foreach ($this->comments as $comment) {
            $result .= "\n- {$comment}";
        }

        $result .= "\nDates attended:";

        usort($this->dates, function($dateA, $dateB){
            return strtotime(implode('-', explode('/', $dateA))) - strtotime(implode('-', explode('/', $dateB))) < 0 ? -1 : 1;
        });

        foreach ($this->dates as $date) {
            $result .= "\n-- {$date}";
        }

        return $result;
    }
}

$usersList = [];
$command = readline();

while ($command != 'end of dates'){
    $data = explode(' ', $command);
    $userExists = false;
    $index = -1;

    array_map(function($user) use($data, &$index, &$userExists){
        $index++;
        if ($user->getName() == $data[0]) $userExists = true;
    }, $usersList);

    if ($userExists != false) {
        if (isset($data[1])){
            $dates = explode(',', $data[1]);
            
            foreach ($dates as $date) {
                $usersList[$index]->addDate($date);
            }
        }

    } else {
        $newUser = new User($data[0]);

        if (isset($data[1])){
            $dates = explode(',', $data[1]);
            
            foreach ($dates as $date) {
                $newUser->addDate($date);
            }
        }

        $usersList[] = $newUser;
    }
    $command = readline();
}

$command = readline();

while ($command != 'end of comments') {
    $data = explode('-', $command);

    foreach ($usersList as $user) {
        if ($user->getName() == $data[0]){
            $user->addComment($data[1]);
        }
    }

    $command = readline();
}

usort($usersList, function($userA, $userB){
    return strcmp($userA->getName(), $userB->getName());
});

foreach ($usersList as $user) {
    echo $user, PHP_EOL;
}
?>