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
    <title>Hikes</title>
</head>

<body>

    <?php require_once 'include/header.php'

    ?>

    <main>
        <div class="container">
            <ul class="tags">
                <li>Tags : </span>
                    <?php
                    foreach ($tags->getListTags() as $key => $tag) {
                    ?>
                <li>
                    <a class="tags__link" href="tag?id=<?php echo htmlspecialchars($tag['ID']); ?>">
                        <?php echo htmlspecialchars($tag['name']); ?>
                    </a>
                </li>
            <?php
                    }
            ?>
            </ul>
            <div class="hikes">
                <?php
                foreach ($hikes->getHikeByTag($_GET["id"]) as $key => $hike) {
                    include 'include/hike.php';
                }
                ?>
            </div>
        </div>
    </main>

    <?php require_once 'include/footer.php'

    ?>

</body>

</html>