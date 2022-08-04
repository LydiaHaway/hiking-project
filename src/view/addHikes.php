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
 
    <form method="POST" action="form_hike">
        <div>
            <label for="name">Titre </label>
            <input type="text" name="name">
        </div>

        <div>
            <label for="distance">Distance (km) </label>
            <input type="number" name="distance">
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

        <div>
            <label for="illustration">Illustration </label>
            <p>Vous pouvez utiliser cet hebergeur et ajouter ici le lien direct <a href="https://postimages.org/" target="_blank">Cliquer ici</a> </p>
            <input type="text" name="illustration">
        </div>
        <br>

        <fieldset>

            <legend>Veuillez sélectionner votre tag :</legend>

            <br>
            <br>

            <?php
            foreach ($tags->getListTags() as $key => $tag) {
            ?>
                <div class="tags">
                    <input type="radio" name="IDTags" value="<?php echo htmlspecialchars($tag['ID']); ?>">
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
</body>

</html>