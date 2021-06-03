<?php
require "functions.php";

if (isset($_POST['submit'])) {
    $db = getDB();
    $errors = validate($_POST, $db);
    if (insertNewPokemon($errors, $_POST, $db)) {
        header('Location: newpokemon.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    <link rel="icon" href="https://pngimg.com/uploads/pokeball/pokeball_PNG21.png">
</head>
<body class="overflow">
    <section  class="pokemon-form">
        <h2 class="favourite-pokemon">
            Add your pokemon!
        </h2>
        <section id="form-section" class="form-section">
            <form action="form.php" method="POST">
                <label>Pokemon name: </label>
                <input class="no-outline" type="text" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? '')?>">
                <div class="error"><?php echo $errors['name'] ?? ''?></div>
                <label>Pokemon type: </label>
                <select name="type" id="type" value="<?php echo htmlspecialchars($_POST['type'] ?? '')?>">
                    <option></option>
                    <option>Normal</option>
                    <option>Fire</option>
                    <option>Water</option>
                    <option>Grass</option>
                    <option>Electric</option>
                    <option>Ice</option>
                    <option>Fighting</option>
                    <option>Poison</option>
                    <option>Ground</option>
                    <option>Flying</option>
                    <option>Psychic</option>
                    <option>Bug</option>
                    <option>Rock</option>
                    <option>Ghost</option>
                    <option>Dark</option>
                    <option>Dragon</option>
                    <option>Steel</option>
                    <option>Fairy</option>
                </select>
                <div class="error"><?php echo $errors['type'] ?? '' ?></div>
                <label>Pokemon weight (kg): </label>
                <input type="number" step="0.1" name="weight" value="<?php echo htmlspecialchars($_POST['weight'] ?? '')?>">
                <div class="error"><?php echo $errors['weight'] ?? '' ?></div>
                <label>Pokemon height (cm): </label>
                <input type="number" step="0.1" name="height" value="<?php echo htmlspecialchars($_POST['height'] ?? '')?>">
                <div class="error"><?php echo $errors['height'] ?? '' ?></div>
                <label>Pokemon ability: </label>
                <input type="text" name="ability" value="<?php echo htmlspecialchars($_POST['ability'] ?? '')?>">
                <div class="error"><?php echo $errors['ability'] ?? '' ?></div>
                <input class="button btn2" type="submit" name="submit" value="Add Pokemon">
            </form>
            <div class="pokemon-background">
                <img src="./img/pokemo.png" alt="ash">
            </div>
        </section>
    </section>
</body>