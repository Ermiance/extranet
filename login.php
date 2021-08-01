<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extranet GBAF</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('header.php'); ?>
    <section>
        <?php
        
        // include('functions.php');

        if (is_null($_COOKIE['username']))
        {
        ?>
        <form method="post" action="loginredirect.php">
            <p>
                Pseudonyme d'utilisateur : <input type="text" name="username" /><br>
                Mot de passe : <input type="password" name="password" /><br>
                <input type="submit" value="Valider" />
            </p>
        </form>
        <?php
        }
        else
        {
            ?>
            <p>
                Vous êtes déjà connecté.
            </p>
            <?php
        }
        ?>
    </section>
    <?php include('footer.php'); ?>
</body>
</html>