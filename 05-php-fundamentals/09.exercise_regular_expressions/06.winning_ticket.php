<?php
$tickets = explode(', ', 'Cash$$$$$$Ca$$$$$ssh');
$regex = '/([@#$^])\1{0,}/';

foreach ($tickets as $ticket) {
    $ticket = trim($ticket);
    if (strlen($ticket) < 20){
        echo 'invalid ticket', PHP_EOL;
    } else if (strlen($ticket) == 20) {
        $firstHalf = substr($ticket, 0, 10);
        $secondHalf = substr($ticket, 10);
        $matchesFirst = [];
        $matchesSecond = [];
        preg_match_all($regex, $firstHalf, $matchesFirst);
        preg_match_all($regex, $secondHalf, $matchesSecond);

        if (count($matchesFirst[0]) == 0 || count($matchesSecond[0]) == 0) echo "ticket \"{$ticket}\" - no match", PHP_EOL;

        foreach ($matchesFirst[0] as $m) {
            foreach ($matchesSecond[0] as $n){
                $count = min(strlen($m), strlen($n));
                $specialChar = $m[0];
                if ($m == $n && $count < 10) echo "ticket \"{$ticket}\" - {$count}{$specialChar}", PHP_EOL;
                else if ($m == $n && $count == 10) echo "ticket \"{$ticket}\" - 10{$specialChar} Jackpot!", PHP_EOL;
            }
        }
    }
}
?>