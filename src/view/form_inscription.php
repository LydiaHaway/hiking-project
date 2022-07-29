<?php

require_once '../model/users.php';

if (!empty($_POST)) {

    $users->subscription();

    echo "Your subscription is done!";
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