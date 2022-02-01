<?php
//un espace membree

//inscription

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/login-logout-form/design/default.css">

    <title>php et mysql</title>
</head>

<body>
    <header>

        <h1>Inscription</h1>
    </header>
    <div class="container">

        <p>Bienvenue sur le site, pour en voir plus veuillez vous inscrire. Sinon il y a ça : <a href="connect.php">connectez vous</a></p>

        <form method="POST" action="index.php">
            <p>
            <table>
                <tr>
                    <td>Pseudo</td>
                    <td><input type="text" name="pseudo" placeholder="ex: jean" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" placeholder="jean.gabin@gmail.com" /></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="password" /></td>
                </tr>
                <tr>
                    <td>Confirmer le mot de passe</td>
                    <td><input type="password" name="passwordConfirm" /></td>
                </tr>
            </table>
            <button type="submit">inscription</button>
            </p>
        </form>
    </div>
</body>

</html>