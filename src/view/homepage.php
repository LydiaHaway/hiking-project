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
    <title>Homepage</title>
</head>

<body>
    <?php require 'include/header.php' ?>

    <main>
        <div class="container">
            <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                <div class="row-fluid space-between">
                    <h2>Bonjour, <?php echo $_SESSION['LOGGED_USER']['firstname']; ?> et bienvenue sur le site !</h2>
                    <?php if ($_SESSION['LOGGED_USER']['is_admin'] == "1") : ?>
                        <a class="link" href="admin">
                            Utilisateurs
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
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
                foreach ($hikes->getHikes() as $key => $hike) {
                    include 'include/hike_homepage.php';
                }
                ?>
            </div>
        </div>
    </main>

    <?php require_once 'include/footer.php'; ?>

</body>

</html>