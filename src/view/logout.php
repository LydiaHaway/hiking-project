<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
</head>
<body>
    
<?php require 'include/header.php' ?>
<?php 

$nowTime = time();

if(isset($_SESSION['LOGGED_USER'])) {
    session_destroy();
}

if($nowTime) {
    header("Location: home");
}
?>
</body>
</html>

