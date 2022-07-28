<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikes</title>
</head>

<body>

    <main>

        <?php
        foreach ($hikes->getHikeByTag($_GET["id"]) as $key => $hike) {
        ?>
            <div class="hikes">

                <h3 class="title">
                    <?php echo htmlspecialchars($hike['name']); ?>
                    <em>, le <?php echo date("d-m-Y", strtotime($hike['date'])); ?></em>
                </h3>

                <p class="info">
                    Distance: <?php echo htmlspecialchars($hike['distance']); ?> km, dénivelée positif: <?php echo htmlspecialchars($hike['elevation_gain']); ?> m,
                    durée moyenne: <?php echo htmlspecialchars($hike['duration']); ?>h
                </p>

                <p class="location">
                    Départ depuis <?php echo htmlspecialchars($hike['location']); ?>
                </p>

                <a class="button" href="hike?id=<?php echo htmlspecialchars($hike['ID']); ?>">
                    <button>Plus d'info</button>
                </a>
            </div>
        <?php
        }
        ?>

        </br>
        <?php
        foreach ($tags->getListTags() as $key => $tag) {
        ?>
            <div class="tags">

                <a class="button" href="tag?id=<?php echo htmlspecialchars($tag['ID']); ?>">
                    <li>
                        <?php echo htmlspecialchars($tag['name']); ?>
                    </li>
                </a>
            </div>
        <?php
        }
        ?>
        </br>

        <a class="button" href="home">
            <button>Home</button>
        </a>


    </main>

</body>

</html>