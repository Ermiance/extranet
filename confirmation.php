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

        include('functions.php');

        // teste si il y a un formulaire
        if (isset($_POST["username"]))
        {
            
            
            if (userExist($_POST["username"]))
            {
                ?>
                <p>
                    Il y a déjà un utilisateur à ce nom.
                </p>
                <?php
            }
            else
            {
                addUser($_POST['nom'], $_POST['prenom'], $_POST['username'], $_POST['password'], $_POST['question'], $_POST['reponse']);
                setcookie('username', $_POST['username'], time() + 24*3600, null, null, false, true);
            }
            
            
            
            //$req->closeCursor();
        }   
        else
        {
        ?>
        <p>
            Redirection vers la page d'enregistrement...
        </p>
        <?php 
        header('Location: index.php');
        }
        ?>
    </section>
    <?php include('footer.php'); ?>
</body>
</html>