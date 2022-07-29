<?php

$routes = [

    'GET' => [
        '/' => '../controller/homepage_controller.php',
        '/home' => '../controller/homepage_controller.php',
        '/hike' => '../controller/hike_controller.php',
        '/formulaire_connection' => '../controller/controller_form_connection.php',
        '/tag' => '../controller/filter_tags_controller.php',
        '/form_inscription' => '../controller/form_inscription_controller.php',
    ],

    'POST' => [
        '/profileUser' => '../view/profileUser.php',
    ],
];
