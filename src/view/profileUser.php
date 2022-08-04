<?php

session_start();

require_once '../model/users.php';
require_once '../model/hikes.php';
require_once '../model/tags.php';

//Suppression d'une randonnée
if (isset($_GET['id'])) {
    $hikes->removeHike($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title>Mon profil</title>
</head>

<body>
    <?php require 'include/header.php' ?>
    <br>
    <h1>
        Bienvenue <?php echo $_SESSION['LOGGED_USER']['firstname']; ?> sur votre profil !
    </h1>
    <br>
    <?php
    foreach ($users->getUser($_SESSION['LOGGED_USER']['ID']) as $key => $user) {
    ?>
        <h2>Informations : </h2>
        <p>
            Prénom: <?php echo htmlspecialchars($user['firstname']); ?>
        </p>

        <p>
            Nom: <?php echo htmlspecialchars($user['lastname']); ?>
        </p>

        <p>
            Login: <?php echo htmlspecialchars($user['nickname']); ?>
        </p>

        <p>
            Email: <?php echo htmlspecialchars($user['email']); ?>
        </p>

        <a href="/profile_update">
            <button>
                Modifier vos informations
            </button>
        </a>

        <br>
        <br>

    <?php
    }
    ?>



    <a class="button" href="form_hike">
        <button>Ajouter une randonnée</button>
    </a>


    <p>
        Voici les randonnées que vous avez créées :
    </p>
    <?php if (isset($validMessage)) : ?>
        <div>
            <?php echo $validMessage; ?>
        </div>
    <?php endif; ?>

    <?php
    foreach ($hikes->getHikeByUser($_SESSION['LOGGED_USER']['ID']) as $key => $hike) {
    ?>
            <div class="hikes">

                <?php

                if ($hike["illustration"] != NULL) {
                ?>
                    <img class="image-hike" src="<?php echo htmlspecialchars($hike['illustration']); ?>" alt="illustration" />
                <?php
                }
                ?>

                <h1>
                    <?php echo htmlspecialchars($hike['name']); ?>
                </h1>
                <p class="date">
                    <em>Ajouté le <?php echo date("d-m-Y", strtotime($hike['date'])); ?></em>
                </p>

                <?php if ($hike['date'] != $hike['update_hike']) { ?>

                    <p class="date">
                        <em>Modifié le <?php echo date("d-m-Y", strtotime($hike['update_hike'])); ?></em>
                    </p>

                <?php } ?>

                <p class="info">
                    Distance: <?php echo htmlspecialchars($hike['distance']); ?> km, dénivelé positif: <?php echo htmlspecialchars($hike['elevation_gain']); ?> m,
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
                    Modifier la randonnée
                </a>
                <a class="button">
                        <button onclick="deleteHike();">Supprimer la randonnée</button>
                    </a>

                    <script>
                    //show a confirmation and redirect to the delete profile script
                        function deleteHike() {
                            if (confirm("Voulez vous vraiment supprimer la randonnée ?")) {
                                location.href = 'deleteHike_Profil?id=<?php echo htmlspecialchars($hike['ID']); ?>';
                            }
                        }
                    </script>
            </div>
    <?php
    }
    ?>
    </main>
    <?php require_once 'include/footer.php'; ?>
</body>

</html>