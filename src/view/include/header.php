<?php session_start(); ?>

<head>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <a class="header__link" href="tag?id=1">
                    Randonnée par tags
                </a>
            </div>
            <h1 class="col-6 header__logo">
                <a class="logo" href="home">
                    <img class="logo__img" src="img/logo.svg" width="220" alt="Logo with a mountain & a pine tree">
                </a>
            </h1>
            <div class="col-3 text-right">
                <div class="user-nav">
                    <?php if (!isset($_SESSION['LOGGED_USER'])) { ?>
                        <a class="header__link user-nav__toggle" href="formulaire_connection">
                            <img src="img/user.svg">
                            <span>Mon compte</span>
                        </a>
                        <ul class="user-nav__list">
                            <li class="user-nav__item">
                                <a class="user-nav__link" href="formulaire_connection">
                                    Connexion
                                </a>
                            </li>
                            <li class="user-nav__item">
                                <a class="user-nav__link" href="formulaire_inscription">
                                    Inscription
                                </a>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <a class="header__link user-nav__toggle" href="profileUser">
                            <img src="img/user.svg">
                            <span>Mon compte</span>
                        </a>
                        <ul class="user-nav__list">
                            <li class="user-nav__item">
                                <a class="user-nav__link" href="form_hike">
                                    Nouvelle rando
                                </a>
                            </li>
                            <li class="user-nav__item">
                                <a class="user-nav__link" href="profileUser">
                                    Mes randonnées
                                </a>
                            </li>
                            <li class="user-nav__item">
                                <a class="user-nav__link" href="profile_update">
                                    Mes informations
                                </a>
                            </li>
                            <li class="user-nav__item">
                                <a class="user-nav__link" href="logout">
                                    Se déconnecter
                                </a>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</header>