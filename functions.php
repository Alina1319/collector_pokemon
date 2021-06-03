<?php

function getDB()
{
    $db = new PDO('mysql:host=db;dbname=pokemons', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function getPokemons($db): array
{
    $query = $db->prepare('SELECT `name`, `pokemon_type`,`height`,`weight`,`ability` FROM `pokedex` JOIN `types` 
                           ON `pokedex`.`type` = `types`.`id`;');
    $query->execute();
    $pokemon = $query->fetchAll();
    return $pokemon;
}

function displayPokemon(array $pokemons): string
{
    $output = '<section class="pokedex">';
    if (empty($pokemons)) {
        $output .= '<p>Something went wrong</p>';
    } else {
        foreach ($pokemons as $pokemon) {
            $output .= '<div class="description"><div class="pokemon-name"><p class="pokemon-heading">' .
                $pokemon['name'] . '</p></div><div class="col"><div class="type-class"><p class="type">Type: ' .
                $pokemon['pokemon_type'] . '</p></div><div class="type-class"><p class="height">Height: ' .
                $pokemon['height'] . '</p></div></div><div class="col"><div class="type-class"><p class="weight">' .
                'Weight: ' . $pokemon['weight'] . '</p></div><div class="type-class"><p class="ability">' . 'Ability: '.
                $pokemon['ability'] . '</p></div></div></div>';
        }
    }
    $output .= '</section>';
    return $output;
}

function validate($postDataPokemon, $db)
{
    $errors = [
        'name' => '',
        'type' => '',
        'height' => '',
        'weight' => '',
        'ability' => '',
    ];
    if (empty($postDataPokemon['name'])) {
        $errors['name'] = 'Please add a pokemon name!';
    } else {
        $query = $db->prepare('SELECT `name` FROM `pokedex` WHERE `name` = ?');
        $query->execute([$postDataPokemon['name']]);
        $pokemon = $query->fetchAll();
        if (!empty($pokemon)) {
            $errors['name'] = 'This pokemon is already in the pokedex!';
        }
    }
    if (empty($postDataPokemon['height'])) {
        $errors['height'] = 'Please add a height value!';
    } else {
        if (!is_numeric($postDataPokemon['height'])) {
            $errors['height'] = 'Height needs to be a number!';
        }
    }
    if (empty ($postDataPokemon['weight'])) {
        $errors['weight'] = 'Please add a weight value!';
    } else {
        if (!is_numeric($postDataPokemon['weight'])) {
            $errors['weight'] = 'weight needs to be a number!';
        }
    }
    if (empty($postDataPokemon['type'])) {
        $errors['type'] = 'Please select a type';
    }
    if (empty($postDataPokemon['ability'])) {
        $errors['ability'] = 'Please add an ability!';
    } else {
        if (!is_string($postDataPokemon['ability'])) {
            $errors['ability'] = 'Ability needs to be a string!';
        }
    }
    return $errors;
}

function insertNewPokemon($errors, $pokemon, $db)
{
    $result = false;
    if (
        empty($errors['name']) && empty($errors['type']) && empty($errors['height']) &&
        empty($errors['weight']) && empty($errors['ability'])
    ) {
        $name = $pokemon['name'];
        $type = $pokemon['type'];
        $query = $db->prepare('SELECT `id` FROM `types` WHERE `pokemon_type` = ?;');
        $query->execute([$type]);
        $poke = $query->fetchAll();
        $height = $pokemon['height'];
        $weight = $pokemon['weight'];
        $ability = $pokemon['ability'];
        $query = $db->prepare('INSERT INTO `pokedex` (`name`, `type`, `height`, `weight`, `ability`) VALUES (?, ?, ?, ?, ?);');
        $result = $query->execute([$name, $poke[0]['id'], $height, $weight, $ability]);
    }
    return $result;
}