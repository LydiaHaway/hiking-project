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
        <div class="container">

        <?php
        foreach ($hikes->getHike($_GET["id"]) as $key => $hike) {
            include 'include/hike-full.php'; 
        }
        ?>
        </div>
    </main>

    <?php require_once 'include/footer.php'

    ?>

</body>

</html>