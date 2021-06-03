<?php

require "functions.php";

$db = getDB();
$pokemons = getPokemons($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="resources/css/normalize.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    <link rel="icon" href="https://pngimg.com/uploads/pokeball/pokeball_PNG21.png">
</head>
<body>
<main>
    <section class="pika-section">
        <h1 class="pika-heading">Pokemon collection</h1>
        <div class="pika">
            <img class="main-img" src="./img/pika.png" alt="pika">
        </div>
        <div class="more-pokemons">
            <p class="add_button">Click here to add a new pokemon into pokedex</p>
            <a href="./form.php" class="button  btn" style="vertical-align:middle"><span>Add </span></a>
        </div>
    </section>
<?php
echo displayPokemon($pokemons);
?>
</main>
</body>
</html>