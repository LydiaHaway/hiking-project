<?php

session_start();

require_once '../model/users.php';
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

    <?php require '../view/include/header.php' ?>

    <main>
        <div class="container">
            <h1 class="title-page">Inscrivez vous !</h1>
            <?php if (empty($_POST)) : ?>
                <?php require_once '../view/form_inscription.php'; ?>
            <?php else : ?>
                <?php if (isset($_POST["firstname"], $_POST["lastname"], $_POST["nickname"], $_POST["email"], $_POST["password"]) && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["nickname"]) && !empty($_POST["email"]) && !empty($_POST["password"])) : ?>
                    <?php if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) : ?>
                        <?php
                        $users->subscription();
                        foreach ($users->getUserNickname($_POST['nickname']) as $key => $users) {
                            $_SESSION['LOGGED_USER'] = [
                                'firstname' => $users['firstname'],
                                'email' => $users['email'],
                                'ID' => $users['ID'],
                                'is_admin' => $users['is_admin'],
                            ];
                        }
                        header("Location: home");
                        ?>

                    <?php else : ?>
                        <p class="alert alert--danger container container--small">Votre email n'est pas valide !</p>
                        <?php require_once '../view/form_inscription.php'; ?>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="alert alert--danger container container--small">Le formulaire d'inscription doit être rempli avant d'être envoyé !</p>
                    <?php require_once '../view/form_inscription.php'; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>

</body>

</html>