<?php session_start(); ?>

<head>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<header>
    <h1>
        <a class="logo" href="home"><img class="logo__img" src="img/logo.png" alt="Logo with a mountain & a pine tree"></a>
    </h1>
    <nav class="nav">
        <ul>
            <li><a class="button" href="tag?id=1">Hikes par tag</a></li>
            <?php if (!isset($_SESSION['LOGGED_USER'])) { ?>
                <li><a class="button" href="formulaire_inscription">Inscription</a></li>
                <li><a class="button" href="formulaire_connection">Connexion</a></li>
            <?php } else { ?>
                <li><a class="button" href="profileUser">Mon compte</a></li>
                <li><a class="button" href="logout">Se déconnecter</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>