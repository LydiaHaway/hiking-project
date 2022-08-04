<?php

require_once '../model/hikes.php';

//Suppression d'une randonnée
if (isset($_GET['id'])) {
    $hikes->removeHike($_GET['id']);
    header("Location: home");

}



