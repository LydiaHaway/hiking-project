<?php

session_start();

require_once '../model/users.php';
require_once '../model/hikes.php';
require_once '../model/tags.php';

if (!empty($_POST)) {

    $users->updateUser();
    echo 'Vos modifications ont été prises en compte !';
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


    <?php
    foreach ($users->getUser($_SESSION['LOGGED_USER']['ID']) as $key => $user) {
    ?>

        <main>
            <form method="POST" action="profile_update">

                <div>
                    <label for="firstname">Prénom </label>
                    <input type="text" name="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>">
                </div>

                <div>
                    <label for="lastname">Nom </label>
                    <input type="text" name="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>">
                </div>

                <div>
                    <label for="nickname">Login </label>
                    <input type="text" name="nickname" value="<?php echo htmlspecialchars($user['nickname']); ?>">
                </div>

                <div>
                    <label for="email">Email </label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                </div>

                <div>
                    <label for="password">Mot de passe </label>
                    <input type="password" name="password">
                </div>

                <input type="hidden" name="ID" value="<?php echo htmlspecialchars($user['ID']); ?>">

                <br>

                <button type="submit">Modifier</button>


            </form>
        </main>

    <?php
    }
    ?>



</body>

</html>