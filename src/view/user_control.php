<?php

session_start();

require_once '../model/users.php';
require_once '../view/include/header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title>Document</title>
</head>

<body>

</body>

</html>
<h1>
    Bienvenue <?php echo $_SESSION['LOGGED_USER']['firstname']; ?> sur votre page admin !
</h1>

<p>
    Voici les utilisateurs de votre site :
</p>

<?php
foreach ($users->getUsers() as $key => $user) {
?>

    <div class="users">
        <h2>
            <?php echo htmlspecialchars($user['firstname']); ?>
        </h2>

        <h3>
            <?php echo htmlspecialchars($user['lastname']); ?>
        </h3>

        <p>
            <?php echo htmlspecialchars($user['nickname']); ?>
        </p>

        <p>
            <?php echo htmlspecialchars($user['email']); ?>
        </p>

        <a class="button" href="*">
            <button>Supprimer l'utilisateur</button>
        </a>
    </div>
<?php
}
?>
</body>

</html>