<?php
require('src/connection.php');



if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm'])) {

    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordConfirm'];


    //on teste si le mots de passes sont identiques :
    if ($password != $passwordconfirm) {
        header('location: /login-logout-form/index.php?error=1&pass=1');
    }

    //on teste si le mail saisi existe déjà dans la bdd
    $req = $db->prepare("SELECT count(*) as numberEmail FROM users WHERE email = ?");
    $req->execute(array($email));

    while ($email_check = $req->fetch()) {

        if ($email_check['numberEmail'] != 0) {
            header('location: /login-logout-form/index.php?error=1&email=1');
        }
    }

    //hash de l'email qui se met dans $secret
    $secret = sha1($email) . time();
    $secret = sha1($secret) . time() . time();

    //cryptage du password a l'aide du grain de sel
    $password = "aq1".sha1($password."1254")."25";

    //envoi de la requete dans la bdd
    $req = $db->prepare('INSERT INTO users(pseudo, email, password, secret) VALUES(?, ?, ?, ?)');
    $req->execute(array($pseudo, $email, $password, $secret));

    header('location:/login-logout-form/?success=1');
}

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

        <p id="info">Bienvenue sur le site, pour en voir plus veuillez vous inscrire. Sinon il y a ça : <a href="connect.php">connectez vous</a></p>

        <?php

        if (isset($_GET['error'])) {

            if (isset($_GET['pass'])) {
                echo '<p id="error">Les mots de passe ne sont pas identiques.</p>';
            } else if (isset($_GET['email'])) {
                echo '<p id="error">L\'adresse mail est déjà utilisée.</p>';
            }
        }

        else if (isset($_GET['success'])){

            echo '<p id="success">Vous êtes bien enregistré, vous pouvez maintenant vous connecter.</p>';
        }

        ?>


        <form method="POST" action="index.php">
            <p>
            <table>
                <tr>
                    <td>Pseudo</td>
                    <td><input type="text" name="pseudo" required placeholder="ex: jean" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" required placeholder="jean.gabin@gmail.com" /></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" required name="password" /></td>
                </tr>
                <tr>
                    <td>Confirmer le mot de passe</td>
                    <td><input type="password" required name="passwordConfirm" /></td>
                </tr>
            </table>

            <div id="button">
                <button type="submit">inscription</button>
            </div>
            </p>
        </form>
    </div>
</body>

</html>