<form method="POST" action="form_hike">
    <div class="form-row">
        <label for="name">Titre </label>
        <input id="name" type="text" name="name">
    </div>
    <div class="form-row">
        <label for="distance">Distance (km) </label>
        <input id="name" type="number" name="distance">
    </div>
    <div class="form-row">
        <label for="duration">Durée (heure) </label>
        <input id="name" type="number" name="duration">
    </div>
    <div class="form-row">
        <label for="elevation_gain">Élévation positive (m) </label>
        <input id="name" type="number" name="elevation_gain">
    </div>
    <div class="form-row">
        <label for="description">Description </label>
        <input id="name" type="text" name="description">
    </div>
    <div class="form-row">
        <label for="location">Localisation </label>
        <input id="name" type="text" name="location">
    </div>
    <div class="form-row">
        <label for="illustration">Illustration </label>
        <p>Vous pouvez utiliser cet hebergeur et ajouter ici le lien direct <a href="https://postimages.org/" target="_blank">Cliquer ici</a> </p>
        <input id="illustration" type="text" name="illustration">
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
    <button class="button" type="submit">Ajouter</button>
</form>