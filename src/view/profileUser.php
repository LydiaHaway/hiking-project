<?php

session_start();

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
            $_SESSION['LOGGED_USER'] = [
                'firstname' => $user['firstname'],
                'email' => $user['email'],
                'ID' => $user['ID'],
                'is_admin' => $user['is_admin'],

            ];
        } else {
            $errorMessage = sprintf(
                'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
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
    <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
        <form action="/view/profileUser.php" method="POST">
            <!-- si message d'erreur on l'affiche -->
            <?php if (isset($errorMessage)) : ?>
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
    <?php else : ?>
        <?php require_once '../view/include/header.php' ?>
        <h1>
            Bonjour <?php echo $_SESSION['LOGGED_USER']['firstname']; ?> et bienvenue sur le site !
        </h1>

        <a class="button" href="formulaire_hike">
            <button>Ajouter une randonnée</button>
        </a>


        <p>
            Voici les randonnées que vous avez créées :
        </p>

        <?php
        foreach ($hikes->getHikeByUser($_SESSION['LOGGED_USER']['ID']) as $key => $hike) {
        ?>

            <div class="hikes">
                <h1>
                    <?php echo htmlspecialchars($hike['name']); ?>
                </h1>
                <p class="date">
                    <em>Ajouté le <?php echo date("d-m-Y", strtotime($hike['date'])); ?></em>
                </p>

                <?php if($hike['date'] != $hike['update_hike']) { ?>

                    <p class="date">  
                        <em>Modifié le <?php echo date("d-m-Y", strtotime($hike['update_hike']));?></em>
                    </p>

                <?php } ?>

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

                <a class="button" href="form_update?id=<?php echo htmlspecialchars($hike['ID']); ?>">
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