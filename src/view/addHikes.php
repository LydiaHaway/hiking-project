<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikes</title>
</head>

<body>

    <main>
        <form method="POST" action="">
            <div>
                <label for="name">Titre </label>
                <input type="text" name="name">
            </div>

            <div>
                <label for="distance">Distance </label>
                <input type="number" name="distance">
            </div>

            <div>
                <label for="elevation_gain">Elevation positive </label>
                <input type="number" name="elevation_gain">
            </div>

            <div>
                <label for="description">Description </label>
                <textarea name="description" id="description" cols="15" rows="5"></textarea>
            </div>

            <div>
                <label for="location">Commune </label>
                <input type="text" name="location">
            </div>

            <div>
                <label for="tags">Tags </label>
                <select>
                    <option></option>
                </select>
            </div>

            <br>

            <button type="submit">Ajouter</button>
        </form>
    </main>

</body>

</html>