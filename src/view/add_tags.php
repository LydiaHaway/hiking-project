<?php

session_start();

require_once '../model/tags.php';

if (!empty($_POST)) {


    $tags->addTags();
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

        <h1>Ajoutez un tags! !</h1>

        <form method="POST" action="add_tags">
            <div>
                <label for="name">Tag </label>
                <input type="text" name="name">
            </div>
            <br>

            <button type="submit">Ajouter</button>
        </form>

    </main>

</body>

</html>