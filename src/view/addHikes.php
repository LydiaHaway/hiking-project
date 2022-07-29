
<?php

require_once '../model/hikes.php';
require_once '../model/users.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title>Hikes</title>
</head>

<body>
    <?php require 'include/header.php' ?>

    <main>
        <form method="POST" action="form_hike">
            <div>
                <label for="name">Titre </label>
                <input type="text" name="name">
            </div>

            <div>
                <label for="date">Date </label>
                <input type="date" name="date">
            </div>

            <div>
                <label for="distance">Distance </label>
                <input type="number" name="distance">
            </div>

            <div>
                <label for="duration">Durée </label>
                <input type="number" name="duration">
            </div>

            <div>
                <label for="elevation_gain">Élévation positive </label>
                <input type="number" name="elevation_gain">
            </div>

            <div>
                <label for="description">Description </label>
                <textarea name="textarea" id="description" cols="15" rows="5"></textarea>
            </div>

            <div>
                <label for="location">Commune </label>
                <input type="text" name="location">
            </div>

            <fieldset>
                <legend>Veuillez sélectionner votre tag :</legend>
                <div>
                    <input type="checkbox" id="easy" name="tags" value="easy">
                    <label for="easy">Facile</label>
                </div>
                <div>
                    <input type="checkbox" id="middle" name="tags" value="middle">
                    <label for="middle">Intermédiaire</label>
                </div>
                <div>
                    <input type="checkbox" id="hard" name="tags" value="hard">
                    <label for="hard">Difficile</label>
                </div>
                <div>
                    <input type="checkbox" id="forest" name="tags" value="forest">
                    <label for="forest">Forestier</label>
                </div>
                <div>
                    <input type="checkbox" id="mountainous" name="tags" value="mountainous">
                    <label for="mountainous">Montagneux</label>
                </div>
            </fieldset>

            <br>

            <button type="submit">Ajouter</button>
        </form>
    </main>

</body>

</html>