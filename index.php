<?php 
include('functions.php');


if (!isset($_COOKIE["username"]))
{
    setcookie('username', null, time() + 24*3600, null, null, false, true); 
}
?>
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
    <section id="presentation">
        <h1>Extranet GBAF</h1>
        <p>Bienvenue sur l'extranet du GBAF</p>
        <img id="illustration" src="illustration.jpg" alt="Illustration GBAF">
    </section>
    <section id="acteurs">
        <h2>Acteurs et partenaires</h2>
        <p>texte acteurs et partenaires</p>
        <div id="liste_acteurs">
            <div class="bloc_acteur">
                <img class="logo_acteur" src="logo_acteur.png" alt="">
                <div class="bloc2">
                    <h3>Nom Acteur</h3>
                    <p>paragraphe de description</p>
                    <p class="suite">Lire la suite</p>
                </div>
            </div>
        </div>
    </section>
    <?php include('footer.php'); ?>
</body>
</html>