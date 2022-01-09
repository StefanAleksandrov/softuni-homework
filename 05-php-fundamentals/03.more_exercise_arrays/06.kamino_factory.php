<?php
function findBestDNA($data){
$dnaLength = intval(readline());
$sequence = readline();
$longestSeq = [];
$counter = 1;

while ($sequence != 'Clone them!'){
    $seqArr = explode('!', $sequence);
    // sequence start index; sequence length, input counter, DNA sequnce, input sum
    $currSeq = [-1, 1, $counter];
    $allSeq = [];
    $sum = 0;

    $filteredArr = array_filter($seqArr, function($value){
        return !is_null($value) && $value != '';
    });

    $seqArr = [];

    foreach($filteredArr as $value){
        $seqArr[] = $value;
    }

    for ($i = 0; $i < $dnaLength; $i++) {
        if ($seqArr[$i] == 1) $sum++;

        if (isset($seqArr[$i + 1]) && $seqArr[$i] == $seqArr[$i + 1] && $seqArr[$i] == '1'){
            if ($currSeq[0] == -1) $currSeq[0] = $i;
            $currSeq[1] ++;
            $currSeq[2] = $counter;
        } else if (isset($seqArr[$i + 1])){
            $currSeq[] = implode(' ', explode('!', $sequence));
            $allSeq[] = $currSeq;
            $currSeq = [-1, 1, $counter];
        } else if ($seqArr[$i] == $seqArr[$i - 1] && $seqArr[$i] == '1'){
            $currSeq[1] ++;
            $currSeq[2] = $counter;
            $currSeq[] = implode(' ', explode('!', $sequence));
            $allSeq[] = $currSeq;
        }
    }

    usort($allSeq, function($a, $b){
        if ($a[1] == $b[1]) return $a[0] - $b[0];
        else return $b[1] - $a[1];
    });

    $finalSeq = $allSeq[0];
    $finalSeq[] = $sum;
    $longestSeq[] = $finalSeq;

    $sequence = readline();
    $counter++;
}

usort($longestSeq, function($a, $b){
    if ($a[1] == $b[1] && $a[0] != $b[0]) return $a[0] - $b[0];
    else if ($a[1] == $b[1] && $a[0] == $b[0]) return $b[4] - $a[4];
    else return $b[1] - $a[1];
});

$outputSequence = $longestSeq[0];

$startIndex = array_shift($outputSequence);
$sampleLength = array_shift($outputSequence);
$sampleNumber = array_shift($outputSequence);
$finalOutputSeq = explode(' ', array_shift($outputSequence));
$sampleSum = array_shift($outputSequence);

$filteredArr = array_filter($finalOutputSeq, function($value){
    return !is_null($value) && $value != '';
});

$finalOutputSeq = [];

foreach($filteredArr as $value){
    $finalOutputSeq[] = $value;
}

echo "Best DNA sample $sampleNumber with sum: $sampleSum.", PHP_EOL;
echo implode(' ', $finalOutputSeq);
}

findBestDNA(['2', '0!0', '0!!!!0', '0!!!!!!!!!1', 'Clone them!']);
?>