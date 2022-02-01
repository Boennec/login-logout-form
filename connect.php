<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/login-logout-form/design/default.css">

    <title>connexion</title>
</head>

<body>
    <header>

        <h1>Connexion</h1>
    </header>
    <div class="container">
        <p id="info">Bienvenue sur le site, si vous n'êtes pas inscrits, veuillez aller là: <a href="index.php">inscrivez-vous</a></p>

        <form method="POST" action="index.php">
            <p>
            <table>

                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" placeholder="jean.gabin@gmail.com" /></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="password" /></td>
                </tr>

            </table>
            <div id="button">
                <button type="submit">Connexion</button>
            </div>
            </p>
        </form>
    </div>

</body>

</html>