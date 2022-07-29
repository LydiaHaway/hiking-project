<?php

require_once '../model/users.php';
require_once '../model/hikes.php';
require_once '../model/tags.php';

// Validation du formulaire
if (isset($_POST['email']) &&  isset($_POST['password'])) {
    foreach ($users->getUsers() as $key => $user) {
        if (
            $user['email'] === $_POST['email'] &&
            $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'firstname' => $user['firstname'],

                'ID' => $user['ID'],

            ];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['email'],
                $_POST['password']
            );
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!--
   Si utilisateur/trice est non identifié(e), on affiche le formulaire
-->
<?php if(!isset($loggedUser)): ?>
<form action="/view/profileUser.php" method="POST">
    <!-- si message d'erreur on l'affiche -->
    <?php if(isset($errorMessage)) : ?>
        <div>
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    <div>
        <label for="email">Email </label>
        <input type="email" name="email">
    </div>

    <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password">
    </div>

    <br>

    <button type="submit">Se connecter</button>
</form>
<!-- 
    Si utilisateur/trice bien connectée on affiche un message de succès
-->
<?php else: ?>
    <h1>
        Bonjour <?php echo $loggedUser['firstname']; ?> et bienvenue sur le site !
    </h1>

    <a class="button" href="*">
        <button>Ajouter une randonnée</button>
    </a>


    <p>
        Voici les randonnées que vous avez créées :
    </p>

    <?php 
    foreach($hikes->getHikeByUser($loggedUser['ID']) as $key => $hike) {
    ?>
        
        <div class="hikes">
                <h1>
                    <?php echo htmlspecialchars($hike['name']); ?>
                </h1>
                <p class="date">
                    <em>Ajouté le <?php echo date("d-m-Y", strtotime($hike['date'])); ?></em>
                </p>

                <p class="info">
                    Distance: <?php echo htmlspecialchars($hike['distance']); ?> km, dénivelée positif: <?php echo htmlspecialchars($hike['elevation_gain']); ?> m,
                    durée moyenne: <?php echo htmlspecialchars($hike['duration']); ?>h
                </p>

                <p class="description">
                    <?php echo htmlspecialchars($hike['description']); ?>
                </p>

                <p class="location">
                    Départ depuis <?php echo htmlspecialchars($hike['location']); ?>.
                </p>

                <?php
                foreach ($tags->getTag($hike['ID_tags']) as $key => $tag) {
                ?>

                    <p class="tags"> Tags: <?php echo htmlspecialchars($tag['name']); ?>
                    </p>

                <?php
                }
                ?>

                <a class="button" href="*">
                    <button>Modifier la randonnée</button>
                </a>
                <a class="button" href="*">
                    <button>Supprimer la randonnée</button>
                </a>
            </div>
        <?php
        }
        ?>
<?php endif; ?>

</body>
</html>