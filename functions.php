<?php

function getDB()
{
    $db = new PDO('mysql:host=db;dbname=pokemons','root','password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function getPokemons($db): array
{
    $query = $db->prepare('SELECT `name`, `pokemon_type`,`height`,`weight`,`ability` FROM `pokedex` JOIN `types` 
                           ON `pokedex`.`type` = `types`.`id`;');
    $result = $query->execute();
    $pokemon = $query->fetchAll();
    return $pokemon;
}

function displayPokemon(array $pokemons): string
{
    $output = '<section class="pokedex">';
    if (empty($pokemons)) {
        $output .= '<p>Is an error</p>';
    } else {
        foreach ($pokemons as $pokemon) {
            $output .= '<div class="description"><div class="pokemon-name"><p class="pokemon-heading">' .
                $pokemon['name'] . '</p></div><div class="col"><div class="type-class"><p class="type">Type: ' .
                $pokemon['pokemon_type'] . '</p></div><div class="type-class"><p class="height">Height: ' .
                $pokemon['height'] . '</p></div></div><div class="col"><div class="type-class"><p class="weight">' .
                'Weight: ' . $pokemon['weight'] .'</p></div><div class="type-class"><p class="ability">' . 'Ability: '.
                $pokemon['ability'] . '</p></div></div></div>';
        }
    }
    $output .= '</section>';
    return $output;
}