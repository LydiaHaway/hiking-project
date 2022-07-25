<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    <h1>Hikes</h1>

    <?php
    foreach ($hikes as $hike) {
    ?>
        <div class="news">
            <h3>
                <?php echo htmlspecialchars($hike['name']); ?>
                <em>le <?php echo $hike['date']; ?></em>
            </h3>
            <p>
                <?php

                echo nl2br(htmlspecialchars($hike['description']));
                ?>
                <br />
            </p>
        </div>
    <?php
    }
    ?>

</body>

</html>