<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title>Hike</title>
</head>

<body>
    <?php require 'include/header.php' ?>
    <main>

        <?php
        foreach ($hikes->getHike($_GET["id"]) as $key => $hike) {
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

                <?php
                foreach ($users->getUser($hike['ID_user']) as $key => $user) {
                ?>

                    <p class="user"> Par <?php echo htmlspecialchars($user['nickname']); ?>
                    </p>

                <?php
                }
                ?>


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

                <?php if ($_SESSION['LOGGED_USER']['is_admin'] == "1") { ?>

                    <a class="button" href="form_update?id=<?php echo htmlspecialchars($hike['ID']); ?>">
                        <button>Modifier la randonnée</button>
                    </a>
                    <a class="button" href="*">
                        <button>Supprimer la randonnée</button>
                    </a>
                <?php } ?>
            </div>
        <?php
        }
        ?>
    </main>

    <?php require_once 'include/footer.php'

    ?>

</body>

</html>