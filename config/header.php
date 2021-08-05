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
<header>
    <a href="index.php"><img id="logo" src="img/logo_gbaf.png" alt="Logo GBAF"></a>
        <div id="membre">
            <img id="photo_membre" src="img/membre.png" alt="Photo membre">
            <p>
                <?php 
                // include('functions.php');
                if (!isset($_COOKIE['username']))
                {
                    echo "<a href='login.php'>Se connecter</a></br><a href='signup.php'>Créer un profil</a>";
                }
                else
                {
                    echo "<a href='settings.php'>" . $_COOKIE['username'] . '</a></br><a href="logoutredirect.php?logout=true">Se déconnecter</a>';
                }
                ?>
            </p>
        </div>
</header>