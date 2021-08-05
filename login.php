<?php include('config/header.php'); ?>
    <section>
        <?php
        
        // include('config/functions.php');

        if (!isset($_COOKIE['username']))
        {
        ?>
        <form method="post" action="loginredirect.php">
            <p>
                Pseudonyme d'utilisateur : <input type="text" name="username" /><br>
                Mot de passe : <input type="password" name="password" /><br>
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