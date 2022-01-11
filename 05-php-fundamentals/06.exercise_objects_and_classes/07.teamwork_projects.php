<?php
class Team {
    private $creator;
    private $name;
    private $members;
    public function __construct(string $creator, string $name){
        $this->creator = $creator;
        $this->name = $name;
        $this->members = [];
    }
    public function getCreator(){
        return $this->creator;
    }
    public function getName(){
        return $this->name;
    }
    public function getMembers(){
        return $this->members;
    }
    public function addMember(string $member){
        $this->members[] = $member;
    }
    public function __toString(){
        return "Team {$this->name} has been created by {$this->creator}!";
    }
}

function findTeamByProp ($name, $array, $prop){
    if ($prop == 'name'){
        foreach ($array as $team) {
            if ($name == $team->getName()){
                return $team;
            }
        }
    } else if ($prop == 'creator'){
        foreach ($array as $team) {
            if ($name == $team->getCreator()){
                return $team;
            }
        }
    } else if ($prop == 'member'){
        foreach ($array as $team) {
            if ($name == $team->getCreator() || in_array($name, $team->getMembers())){
                return $team;
            }
        }
    }

    return false;
}

$teamsList = [];
$numberOfTeams = intval(readline());

for ($i = 0; $i < $numberOfTeams; $i++){
    $data = explode('-', readline());
    $team = findTeamByProp($data[1], $teamsList, 'name');
    $creator = findTeamByProp($data[0], $teamsList, 'creator');

    if ($team){
        echo "Team {$team->getName()} was already created!", PHP_EOL;
    } else if ($creator){
        echo "{$team->getCreator()} cannot create another team!", PHP_EOL;
    } else {
        $newTeam = new Team(...$data);
        $teamsList[] = $newTeam;
        echo $newTeam, PHP_EOL;
    }
}

$command = readline();

while ($command != 'end of assignment'){
    $data = explode('->', $command);
    $team = findTeamByProp($data[1], $teamsList, 'name');
    $member = findTeamByProp($data[0], $teamsList, 'member');

    if (!$team){
        echo "Team {$data[1]} does not exist!", PHP_EOL;
    } else if ($member){
        echo "Member {$data[0]} cannot join team {$data[1]}!", PHP_EOL;
    } else {
        $team->addMember($data[0]);
    }

    $command = readline();
}

$teamsToDisband = array_filter($teamsList, function($team){
    return count ($team->getMembers()) < 1;
});

usort($teamsList, function($teamA, $teamB){
    return count($teamB->getMembers()) - count($teamA->getMembers());
});

foreach ($teamsList as $team) {
    $members = $team->getMembers();
    if (count($members) < 1) continue;
    echo $team->getName(), PHP_EOL, "- {$team->getCreator()}", PHP_EOL;

    foreach ($members as $member) {
        echo "-- {$member}", PHP_EOL;
    }
}

echo 'Teams to disband:', PHP_EOL;
usort($teamsToDisband, function($teamA, $teamB){
    return strcmp($teamA->getName(), $teamB->getName());
});

foreach ($teamsToDisband as $team) {
    echo $team->getName(), PHP_EOL;
}
?>