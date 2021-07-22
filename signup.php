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
        <form method="post" action="confirmation.php">
            <p>
                Nom : <input type="text" name="nom" /><br>
                Prénom : <input type="text" name="prenom" /><br>
                Pseudonyme d'utilisateur : <input type="text" name="username" /><br>
                Mot de passe : <input type="password" name="password" /><br>
                Question de sécurité : <input type="text" name="question" /><br>
                Réponse : <input type="text" name="reponse" /><br>
                <input type="submit" value="Valider" />
            </p>
        </form>
    </section>
    <?php include('footer.php'); ?>
</body>
</html>