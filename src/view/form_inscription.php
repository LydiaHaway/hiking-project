<?php

session_start();

require_once '../model/users.php';

if (!empty($_POST)) {

    if (
        isset($_POST["firstname"], $_POST["lastname"], $_POST["nickname"], $_POST["email"], $_POST["password"]) &&
        !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["nickname"]) && !empty($_POST["email"])
        && !empty($_POST["password"])
    ) {
        foreach ($users->getUsers() as $key => $user) {
            if (
                $user['email'] === $_POST['email']
            ) {
                require_once 'include/header.php';
                echo "your email has already been used!" . '<br>';
            }

            if (
                $user['nickname'] === $_POST['nickname']
            ) {
                require_once 'include/header.php';
                echo "this nickname has already been used!" . '<br>';
            } else {
                $users->subscription();

                require_once 'include/header.php';
                echo "Your subscription is done!" . '<br>';
            }
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
    <title>Form</title>
</head>

<body>

    <?php require 'include/header.php' ?>

    <main>

        <h1>Inscrivez vous !</h1>

        <form method="POST" action="form_inscription">
            <div>
                <label for="firstname">Prénom </label>
                <input type="text" name="firstname">
            </div>

            <div>
                <label for="lastname">Nom </label>
                <input type="text" name="lastname">
            </div>

            <div>
                <label for="nickname">Login </label>
                <input type="text" name="nickname">
            </div>

            <div>
                <label for="email">Email </label>
                <input type="email" name="email">
            </div>

            <div>
                <label for="password">Mot de passe </label>
                <input type="password" name="password">
            </div>

            <br>

            <button type="submit">S'inscrire</button>
        </form>

    </main>

</body>

</html>