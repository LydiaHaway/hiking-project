<header>
    <h1>
        <a class="logo" href="home"><img class="logo__img" src="img/logo.png" alt="Logo with a mountain & a pine tree"></a>
    </h1>
    <nav class="nav">
        <ul>
            <li><a class="button" href="home">Home</a></li>
            <li><a class="button" href="hike">Hikes</a></li>
            <?php if (!isset($_SESSION['LOGGED_USER'])) { ?>
                <li><a class="button" href="formulaire_connection">Connexion</a></li>
            <?php } else { ?>
                <li><a class="button" href="profileUser">Mon compte</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>