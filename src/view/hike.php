<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hike</title>
</head>

<body>

    <main>

        <?php
        $hikes = $hikeByID->getHike($_GET["id"]);
        foreach ($hikes as $hike) {
        ?>
            <div class="hikes">
                <h1>
                    <?php echo htmlspecialchars($hike['name']); ?>
                </h1>
                <p class="date">
                    <em>Ajouté le <?php echo date("d-m-Y", strtotime($hike['date'])); ?></em>
                </p>

                <?php
                $users = $user->getUser($hike['ID_user']);
                foreach ($users as $user) {
                ?>

                    <p class="user"> Par <?php echo htmlspecialchars($user['nickname']); ?>
                    </p>

                <?php
                }
                ?>


                <p class="info">
                    Distance: <?php echo htmlspecialchars($hike['distance']); ?> km, dénivelée positif: <?php echo htmlspecialchars($hike['elevation_gain']); ?> m,
                    durée moyenne: <?php echo htmlspecialchars($hike['duration']); ?>h
                </p>

                <p class="description">
                    <?php echo htmlspecialchars($hike['description']); ?>
                </p>

                <p class="location">
                    Départ depuis <?php echo htmlspecialchars($hike['location']); ?>.
                </p>

                <?php
                $tags = $tag->getTag($hike['ID_tags']);
                foreach ($tags as $tag) {
                ?>

                    <p class="tags"> Tags: <?php echo htmlspecialchars($tag['name']); ?>
                    </p>

                <?php
                }
                ?>

                <a class="button" href="home">
                    <button>Home</button>
                </a>
            </div>
        <?php
        }
        ?>
    </main>

</body>

</html>