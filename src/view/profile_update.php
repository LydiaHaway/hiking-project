<?php

session_start();

require_once '../model/users.php';
require_once '../model/hikes.php';
require_once '../model/tags.php';

if (!empty($_POST)) {

    if (
        isset($_POST["firstname"], $_POST["lastname"], $_POST["nickname"], $_POST["email"], $_POST["password"]) &&
        !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["nickname"]) && !empty($_POST["email"])
        && !empty($_POST["password"])
    ) {
        $users->updateUser();
        header("Location: profileUser");
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
    <title>Hikes</title>
</head>

<body>
    <?php require 'include/header.php' ?>

    <main>
        <div class="container">
            <h1 class="title-page">
                Modifier mes informations
            </h1>
            <?php
            foreach ($users->getUser($_SESSION['LOGGED_USER']['ID']) as $key => $user) {
            ?>
            <form method="POST" action="profile_update" class="form-user">
                <div class="form-row">
                    <label for="firstname">Prénom </label>
                    <input type="text" name="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>">
                </div>
                <div class="form-row">
                    <label for="lastname">Nom </label>
                    <input type="text" name="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>">
                </div>
                <div class="form-row">
                    <label for="nickname">Login </label>
                    <input type="text" name="nickname" value="<?php echo htmlspecialchars($user['nickname']); ?>">
                </div>
                <div class="form-row">
                    <label for="email">Email </label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                </div>
                <div class="form-row">
                    <label for="password">Mot de passe </label>
                    <input type="password" name="password">
                </div>
                <input type="hidden" name="ID" value="<?php echo htmlspecialchars($user['ID']); ?>">
                <button type="submit">Modifier</button>
            </form>
            <?php
            }
            ?>
        </div>
    </main>
</body>
</html>