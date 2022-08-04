<?php

$routes = [

    'GET' => [
        '/' => '../controller/homepage_controller.php',
        '/home' => '../controller/homepage_controller.php',
        '/hike' => '../controller/hike_controller.php',
        '/formulaire_connection' => '../controller/controller_form_connection.php',
        '/tag' => '../controller/filter_tags_controller.php',
        '/form_inscription' => '../controller/controller_form_inscription.php',
        '/formulaire_inscription' => '../model/form_inscription.php',
        '/formulaire_hike' => '../controller/controller_form_addHikes.php',
        '/form_hike' => '../model/form_hike.php',
        '/form_update' => '../controller/controller_update.php',
        '/add_tags' => '../controller/controller_add_tags.php',
        '/admin' => '../controller/controller_user_control.php',
        '/profile_update' => '../controller/controller_profile_update.php',
        '/profileUser' => '../view/profileUser.php',
        '/logout' => '../controller/controller_logout.php',
    ],

    'POST' => [
        '/form_connection' => '../view/form_connection.php',
        '/form_inscription' => '../model/form_inscription.php',
        '/form_hike' => '../model/form_hike.php',
        '/form_update' => '../controller/controller_update.php',
        '/add_tags' => '../controller/controller_add_tags.php',
        '/profile_update' => '../controller/controller_profile_update.php',
    ],
];
