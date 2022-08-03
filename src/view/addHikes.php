<?php

session_start();

require_once '../model/hikes.php';
require_once '../model/users.php';
require_once '../model/tags.php';

if (!empty($_POST)) {

    $hikes->addHike();
    echo "Votre randonnée a été ajoutée!" . '<br>';

    echo '<a href="/profileUser">
    <button>profile</button>
</a>';
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
        <form method="POST" action="form_hike">
            <div>
                <label for="name">Titre </label>
                <input type="text" id="name" name="name">
            </div>

            <div>
                <label for="distance">Distance (km) </label>
                <input type="number" id="distance" name="distance">
            </div>

            <div>
                <label for="duration">Durée (heure) </label>
                <input type="number" name="duration">
            </div>

            <div>
                <label for="elevation_gain">Élévation positive (m) </label>
                <input type="number" name="elevation_gain">
            </div>

            <div>
                <label for="description">Description </label>
                <input type="text" name="description">
            </div>

            <div>
                <label for="location">Localisation </label>
                <input type="text" name="location">
            </div>

            <fieldset>
                <legend>Veuillez sélectionner votre tag :</legend>

                <?php
                foreach ($tags->getListTags() as $key => $tag) {
                ?>
                    <div class="tags">
                        <input id="radio-<?php echo htmlspecialchars($tag['ID']); ?>" type="radio" name="IDTags" value="<?php echo htmlspecialchars($tag['ID']); ?>">
                        <label for="radio-<?php echo htmlspecialchars($tag['ID']); ?>"><?php echo htmlspecialchars($tag['name']); ?></label>
                    </div>
                <?php
                }
                ?>
            </fieldset>

            <input type="hidden" name="ID_user" value="<?php echo htmlspecialchars($_SESSION['LOGGED_USER']['ID']); ?>">

            <br>

            <button class="button" type="submit">Ajouter</button>

        </form>
    </main>

</body>

</html>