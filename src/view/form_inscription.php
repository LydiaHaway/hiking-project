<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title>Form</title>
</head>

<body>
        <form method="POST" action="form_inscription">
            <div>
                <label for="firstname">Prénom </label>
                <input type="text" name="firstname">
            </div>

            <div>
                <label for="lastname">Nom </label>
                <input type="text" name="lastname">
            </div>

            <div>
                <label for="nickname">Login </label>
                <input type="text" name="nickname">
            </div>

            <div>
                <label for="email">Email </label>
                <input type="email" name="email">
            </div>

            <div>
                <label for="password">Mot de passe </label>
                <input type="password" name="password">
            </div>

            <input type="hidden" name="is_admin" value="0">

            <br>

            <button type="submit">S'inscrire</button>
        </form>
</body>

</html>