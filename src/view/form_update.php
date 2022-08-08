<?php

session_start();

require_once '../model/users.php';
require_once '../model/hikes.php';
require_once '../model/tags.php';

if (!empty($_POST)) {
    if (
        isset($_POST["name"], $_POST["distance"], $_POST["duration"], $_POST["elevation_gain"], $_POST["description"], $_POST["location"])
        && !empty($_POST["name"]) && !empty($_POST["distance"]) && !empty($_POST["duration"]) && !empty($_POST["elevation_gain"])
        && !empty($_POST["description"]) && !empty($_POST["location"])
    ) {
        $hikes->updateHike();
        header("Location: profileUser");
    }
}



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
        <div class="container">
            <?php
            foreach ($hikes->getHike($_GET["id"]) as $key => $hike) {
            ?>
                <form method="POST" action="form_update">
                    <div class="form-row">
                        <label for="name">Titre </label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($hike['name']); ?>">
                    </div>
                    <div class="form-row">
                        <label for="distance">Distance (km) </label>
                        <input type="number" name="distance" value="<?php echo htmlspecialchars($hike['distance']); ?>">
                    </div>
                    <div class="form-row">
                        <label for="duration">Durée (heure) </label>
                        <input type="number" name="duration" value="<?php echo htmlspecialchars($hike['duration']); ?>">
                    </div>
                    <div class="form-row">
                        <label for="elevation_gain">Élévation positive (m) </label>
                        <input type="number" name="elevation_gain" value="<?php echo htmlspecialchars($hike['elevation_gain']); ?>">
                    </div>
                    <div class="form-row">
                        <label for="description">Description </label>
                        <input type="text" name="description" value="<?php echo htmlspecialchars($hike['description']); ?>">
                    </div>
                    <div class="form-row">
                        <label for="location">Commune </label>
                        <input type="text" name="location" value="<?php echo htmlspecialchars($hike['location']); ?>">
                    </div>
                    <div class="form-row">
                        <label for="illustration">Illustration </label>
                        <p>Vous pouvez utiliser cet hebergeur et ajouter ici le lien direct <a href="https://postimages.org/" target="_blank">Cliquer ici</a> </p>
                        <input type="text" name="illustration" value="<?php echo htmlspecialchars($hike['illustration']); ?>">
                    </div>
                    <fieldset>
                        <legend>Veuillez sélectionner votre tag :</legend>
                        <?php
                        foreach ($tags->getListTags() as $key => $tag) {
                        ?>
                            <div class="tags">
                                <input type="radio" name="IDTags" value="<?php echo htmlspecialchars($tag['ID']); ?>">
                                <label for="<?php echo htmlspecialchars($tag['ID']); ?>"><?php echo htmlspecialchars($tag['name']); ?></label>
                            </div>
                        <?php
                        }
                        ?>
                    </fieldset>
                    <input type="hidden" name="ID" value="<?php echo htmlspecialchars($hike['ID']); ?>">
                    <button type="submit">Ajouter</button>
                </form>
            <?php
            }
            ?>
        </div>
    </main>
</body>

</html>