<?php

$routes = [

    'GET' => [
        '/' => '../controller/homepage_controller.php',
        '/home' => '../controller/homepage_controller.php',
        '/hike' => '../controller/hike_controller.php',
        '/formulaire_connection' => '../controller/controller_form_connection.php',
        '/tag' => '../controller/filter_tags_controller.php',
        '/form_inscription' => '../controller/controller_form_inscription.php',
        '/formulaire_hike' => '../controller/controller_form_addHikes.php',
    ],

    'POST' => [
        '/profileUser' => '../view/profileUser.php',
        '/form_inscription' => '../controller/controller_form_inscription.php',
        '/form_hike' => '../controller/controller_form_addHikes.php',
    ],
];
