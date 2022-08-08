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
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <h1>Mon compte</h1>
                    <p>
                        Bienvenue <?php echo $_SESSION['LOGGED_USER']['firstname']; ?> sur votre profil !
                    </p>
                </div>
                <div class="col-md-3 col-12 text-right">
                    <a class="btn" href="form_hike">
                        + Ajouter une randonnée
                    </a>
                </div>
            </div>
        <?php
        foreach ($users->getUser($_SESSION['LOGGED_USER']['ID']) as $key => $user) {
        ?>
            <div class="box">
                <h2>Informations </h2>
                <ul>
                    <li>
                        Prénom: <?php echo htmlspecialchars($user['firstname']); ?>
                    </li>
                    <li>
                        Nom: <?php echo htmlspecialchars($user['lastname']); ?>
                    </li>
                    <li>
                        Login: <?php echo htmlspecialchars($user['nickname']); ?>
                    </li>
                    <li>
                        Email: <?php echo htmlspecialchars($user['email']); ?>
                    </li>
                </ul>
                <br>
                <p>
                    <a class="link" href="/profile_update">
                            Modifier vos informations
                    </a>
                </p>
            </div>
        <?php
        }

        if(count($hikes->getHikeByUser($_SESSION['LOGGED_USER']['ID']) ) > 0) {
        ?>
            <h3 class="mb-2">
                Voici les randonnées que vous avez créées :
            </h3>
            <?php if (isset($validMessage)) : ?>
                <div>
                    <?php echo $validMessage; ?>
                </div>
            <?php endif; ?>

            <?php
            foreach ($hikes->getHikeByUser($_SESSION['LOGGED_USER']['ID']) as $key => $hike) {
                include 'include/hike.php'; 
            }
        } else {
            ?>
            <p class="alert alert--warning">
                Aucune randonnée enregistrée
            </p>
            <?php
        }
        ?>
        </div>
    </main>
    <?php require_once 'include/footer.php'; ?>
</body>

</html>