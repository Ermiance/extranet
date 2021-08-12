<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extranet GBAF</title>
    <link rel="stylesheet" href="config/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
<header>
    <div id="top_header">
        <a href="index.php"><img id="logo" src="img/logo_gbaf.png" alt="Logo GBAF"></a>
        <div id="membre">
            <?php 
            include('functions.php');
            if (!isset($_COOKIE['username']))
            {
                ?>
                <img id="photo_membre" src="img/membre.png" alt="Photo membre">
                <p>
                    <a href='login.php'>Se connecter</a><br><a href='signup.php'>Créer un profil</a>
                </p>
                <?php
            }
            else
            {
                try
                {
                    $user = loadUSer($_COOKIE['username']);
                }
                catch (exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                } 
                ?>
                <a href='settings.php'><img id="photo_membre" src="img/membre.png" alt="Photo membre"></a>
                <p>
                    <a href='settings.php'><?=$user['nom'] . ' ' . $user['prenom']?></a><br>
                    <a href="logoutredirect.php?logout=true">Se déconnecter</a>
             </p>
                <?php
            }
            ?>
            </p>
        </div>
    </div>
    <?php
    if(isset($_COOKIE['login']))
    {
        if($_COOKIE['login'] == 'true')
        {
            ?>
            <p id="bienvenue">Bienvenue <?=$user['prenom']?> !</p>
            <?php
            setcookie('login', 'false', time() + 60, null, null, false, true);
        }
    }
    ?>
</header>