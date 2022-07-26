<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>

    <main>

        <h1>Hikes Challenge</h1>

        <?php
        require_once '../controller/database_controller.php';
        foreach ($hikes as $hike) {
        ?>
            <div class="hikes">
                <a href="">
                    <h3>
                        <?php echo htmlspecialchars($hike['name']); ?>
                        <em>, le <?php echo date("d-m-Y", strtotime($hike['date'])); ?></em>
                    </h3>
                </a>

                <p>
                    Distance: <?php echo htmlspecialchars($hike['distance']); ?> km, dénivelée positif: <?php echo htmlspecialchars($hike['elevation_gain']); ?> m,
                    durée moyenne: <?php echo htmlspecialchars($hike['duration']); ?>h
                </p>
                <p>
                    Départ depuis <?php echo htmlspecialchars($hike['location']); ?>
                </p>
            </div>
        <?php
        }
        ?>

    </main>




</body>

</html>