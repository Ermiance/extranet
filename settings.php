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
        <form method="post" action="settingsredirect.php">
            <p>
                Vous pouvez changer ci-dessous vos paramètres personnels :</br>
                Nom : <input type="text" name="nom" /><br>
                Prénom : <input type="text" name="prenom" /><br>
                Mot de passe : <input type="password" name="password" /><br>
                Question de sécurité : <input type="text" name="question" /><br>
                Réponse : <input type="text" name="reponse" /><br>
                <input type="hidden" name="username" value=<?php echo $_COOKIE['username'] ?> />
                <input type="submit" value="Valider" /></br>
                Note: vous serez déconnecté à la suite de cette opération.
            </p>
        </form>
        
    </section>
    <?php include('footer.php'); ?>
</body>
</html>