<?php include('config/header.php'); ?>
    <section>
        <?php
        
        // include('config/functions.php');

        if (!isset($_COOKIE['username']))
        {
            if(isset($_GET['login']))
            {
                if($_GET['login'] == 'wrongpw')
                {
                    ?>
                    <p>Mauvais mot de passe ou identifiant !</p>
                    <?php
                }
                elseif($_GET['login'] == 'wronguser')
                {
                    ?>
                    <p>Cet identifiant n'existe pas !</p>
                    <?php
                }
            }
                ?>
            <form method="post" action="loginredirect.php">
                <p>
                    Pseudonyme d'utilisateur : <input type="text" name="username" /><br>
                    Mot de passe : <input type="password" name="password" /><br>
                    <input type="checkbox" name="question" id='question'/><label for="question">J'ai oublié mon mot de passe comme un teubé</label>
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
    <?php include('config/footer.php'); ?>
</body>
</html>