<?php

session_start();

require_once '../model/hikes.php';
require_once '../model/users.php';
require_once '../model/tags.php';

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
    <?php require '../view/include/header.php' ;?>

<main>
    <?php if (empty($_POST)) : ?>
        <?php require_once '../view/addHikes.php'; ?>
    <?php else : ?>
        <?php if (isset($_POST["name"], $_POST["distance"], $_POST["duration"], $_POST["elevation_gain"], $_POST["description"], $_POST["location"]) && !empty($_POST["name"]) && !empty($_POST["distance"]) && !empty($_POST["duration"]) && !empty($_POST["elevation_gain"]) && !empty($_POST["description"]) && !empty($_POST["location"])) : ?>
                <?php $hikes->addHike(); ?>
                <?php header("Location: profileUser");?>
        <?php else : ?>
            <p>Le formulaire d'inscription doit être rempli avant d'être envoyé !</p>  
            <?php require_once '../view/addHikes.php';?>
        <?php endif; ?>
    <?php endif; ?>
</main>

</body>

</html>