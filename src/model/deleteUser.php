<?php

require_once '../model/users.php';

//Suppression d'un utilisateur 
if (isset($_GET['id'])) {
    $users->removeUser($_GET['id']);
    header("Location: admin");

}
