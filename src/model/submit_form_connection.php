<?php

require '../model/users.php';

// Validation du formulaire
if (isset($_POST['email']) &&  isset($_POST['password'])) {
    foreach ($users->getUsers() as $key => $user) {
        if (
            $user['email'] === $_POST['email'] &&
            $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'firstname' => $user['firstname'],
            ];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['email'],
                $_POST['password']
            );
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!--
   Si utilisateur/trice est non identifié(e), on affiche le formulaire
-->
<?php if(!isset($loggedUser)): ?>
<form action="/model/submit_form_connection.php" method="POST">
    <!-- si message d'erreur on l'affiche -->
    <?php if(isset($errorMessage)) : ?>
        <div>
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    <div>
        <label for="email">Email </label>
        <input type="email" name="email">
    </div>

    <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password">
    </div>

    <br>

    <button type="submit">Se connecter</button>
</form>
<!-- 
    Si utilisateur/trice bien connectée on affiche un message de succès
-->
<?php else: ?>
    <div>
        Bonjour <?php echo $loggedUser['firstname']; ?> et bienvenue sur le site !
    </div>
<?php endif; ?>

</body>
</html>
