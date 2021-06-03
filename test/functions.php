<?php

require '../functions.php';

use PHPUnit\Framework\TestCase;

class functions extends TestCase
{
    public function testDisplayPokemonSucces()
    {
        $input = [
            [
                'name' => 'bulbasaur',
                'pokemon_type' => 'grass',
                'height' => '2',
                'weight' => '2',
                'ability' => 'overgrow'
            ]
        ];

        $expected = '<section class="pokedex"><div class="description"><div class="pokemon-name">' .
            '<p class="pokemon-heading">bulbasaur</p></div><div class="col"><div class="type-class">' .
            '<p class="type">Type: grass</p></div><div class="type-class"><p class="height">Height: 2</p>' .
            '</div></div><div class="col"><div class="type-class"><p class="weight">Weight: 2</p></div>' .
            '<div class="type-class">' .
            '<p class="ability">Ability: overgrow</p></div></div></div></section>';
        $result = displayPokemon($input);
        $this->assertEquals($expected, $result);
    }

    public function testDisplayPokemonFailure()
    {
        $input = [];
        $result = displayPokemon($input);
        $expected = '<section class="pokedex"><p>Something went wrong</p></section>';
        $this->assertEquals($expected, $result);
    }

    public function testDisplayPokemonMalformed()
    {
        $input = "";
        $this->expectException(TypeError::class);
        displayPokemon($input);
    }
}