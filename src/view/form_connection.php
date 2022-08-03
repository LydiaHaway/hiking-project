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
            password_verify($_POST['password'], $user['password'])
        ) {
            $_SESSION['LOGGED_USER'] = [
                'firstname' => $user['firstname'],
                'email' => $user['email'],
                'ID' => $user['ID'],
                'is_admin' => $user['is_admin'],

            ];
        } else {
            $errorMessage = sprintf(
                'Les informations envoyées ne permettent pas de vous identifier ou vous n\'êtes pas inscrit :'
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
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title>Form</title>
</head>

<body>
    <?php require 'include/header.php' ?>

    <main>
        <h1>Connectez vous !</h1>
<!--
   Si utilisateur/trice est non identifié(e), on affiche le formulaire
-->
    <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
        <form action="form_connection" method="POST">
            <!-- si message d'erreur on l'affiche -->
            <?php if (isset($errorMessage)) : ?>
                <p>
                    <?php echo $errorMessage; ?>
                    <a href="form_inscription">Inscrivez vous !</a>
                </p>
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
        <?php header("Location: home"); ?>

    <?php endif; ?>
    </main>

</body>

</html>