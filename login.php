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
        <form method="post" action="index.php">
            <p>
                <input type="text" name="pseudo" />
                <input type="password" name="password" />
                <input type="submit" value="Valider" />
            </p>
        </form>
    </section>
    <?php include('footer.php'); ?>
</body>
</html>