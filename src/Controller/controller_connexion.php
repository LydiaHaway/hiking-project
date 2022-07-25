<?php

require_once '../Model/connexion.php';

$hikes = getHikes();

require_once '../View/homepage.php';
