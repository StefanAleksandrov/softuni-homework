<?php
$pokemonsToCatch = array_map('intval', explode(' ', readline()));
$index = intval(readline());
$caughtPokemons = [];

while(count($pokemonsToCatch) > 0){
    if($index < 0){
        $currentPokemon = array_splice($pokemonsToCatch, 0, 1, $pokemonsToCatch[count($pokemonsToCatch) - 1])[0];
    } else if ($index >= count($pokemonsToCatch)){
        $currentPokemon = array_splice($pokemonsToCatch, count($pokemonsToCatch) - 1, 1, $pokemonsToCatch[0])[0];
    } else {
        $currentPokemon = array_splice($pokemonsToCatch, $index, 1)[0];
    }

    $caughtPokemons[] = $currentPokemon;

    $pokemonsToCatch = array_map(function($value) use ($currentPokemon){
        if ($value <= $currentPokemon){
            return $value + $currentPokemon;
        } else {
            return $value - $currentPokemon;
        }
    }, $pokemonsToCatch);

    $index = intval(readline());
}

echo array_sum($caughtPokemons);
?>