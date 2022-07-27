<?php

$routes = [

    'GET' => [
        '/' => '../controller/homepage_controller.php',
        '/home' => '../controller/homepage_controller.php',
        '/hike' => '../controller/hike_controller.php',
        '/formulaire_connection' => '../controller/controller_form_connection.php',
    ],

    'POST' => [
        '/model/submit_form_connection.php' => '../model/submit_form_connection.php',
    ],
];
