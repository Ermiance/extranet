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
        // teste si il y a un formulaire
        if (isset($_POST["username"]))
        {
            //essaie une connexion au SQL et traite l'exception
          function connectBdd(){
            try
            {
               return $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 
                'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch (exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            } 
          }
            
            // vérifie username
            function userExist($user){

            
                $req = connectBdd()->prepare("SELECT username FROM account WHERE username = ?");
            
                $req->execute(array($user));
                  
                $user = $req->fetch();
             
               return $user['username'];
            }
            
            
            if (userExist($_POST["username"]))
            {
                ?>
                <p>
                    Il y a déjà un utilisateur à ce nom.
                </p>
                <?php
            }
            else
            // ajoute l'entrée dans "account"
            {
                $ins = $bdd->prepare("INSERT INTO account(nom, prenom, username, password, question, reponse)
                VALUES (:nom, :prenom, :username, :password, :question, :reponse)");
                var_dump($ins);
                $ins->exec(array(
                    'nom' => $_POST['nom'], 
                    'prenom' => $_POST['prenom'], 
                    'username' => $_POST['username'], 
                    'password' => $_POST['password'], 
                    'question' => $_POST['question'], 
                    'reponse' => $_POST['reponse']
                ));
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
        }
        ?>
    </section>
    <?php include('footer.php'); ?>
</body>
</html>