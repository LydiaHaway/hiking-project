<?php

session_start();

require_once '../model/users.php';

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
<?php
require_once '../view/include/header.php';
?>
    <main>
        <div class="container">
            <h1>
                Bienvenue <?php echo $_SESSION['LOGGED_USER']['firstname']; ?> sur votre page admin !
            </h1>
            <p class="mt-1">
                Voici les utilisateurs de votre site :
            </p>
            <div class="row">
                <?php
                foreach ($users->getUsers() as $key => $user) {
                ?>
                <div class="col-12 col-md-6">
                    <div class="box mb-1">
                        <h2>
                            <?php echo htmlspecialchars($user['firstname']); ?> <?php echo htmlspecialchars($user['lastname']); ?>
                        </h2>

                        <p class="mt-1">
                            Pseudo : <?php echo htmlspecialchars($user['nickname']); ?>
                        </p>

                        <p class="mt-1">
                            <?php echo htmlspecialchars($user['email']); ?>
                        </p>

                        <a class="link mt-2" onclick="deleteUser();">
                            <img src="img/close.svg">
                            Supprimer l'utilisateur
                        </a>

                        <script>
                        //show a confirmation and redirect to the delete profile script
                            function deleteUser() {
                                if (confirm("Voulez vous vraiment supprimer l'utilisateur ?")) {
                                    location.href = 'deleteUser?id=<?php echo htmlspecialchars($user['ID']); ?>';
                                }
                            }
                        </script>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>
</body>
</html>