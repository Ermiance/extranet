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
        if isset($_POST)
            //essaie une connexion au SQL et traite l'exception
            {
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
            }
            catch (exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
            //la demande SQL
            $sql_query = "SELECT COUNT(*) AS num FROM 'account' WHERE username = :username";
            //prépare le SQL
            $stmt = $bdd->prepare($sql_query);
            
            if $_POST['username'] == 

    </section>
    <?php include('footer.php'); ?>
</body>
</html>