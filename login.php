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
                    <p id="error_message">Mauvais mot de passe ou identifiant !</p>
                    <?php
                }
                elseif($_GET['login'] == 'wronguser')
                {
                    ?>
                    <p id="error_message">Cet identifiant n'existe pas !</p>
                    <?php
                }
            }
            ?>
            <form method="post" action="loginredirect.php">
                <div id="form">
                    <div class='form_div'>
                        <p>Pseudonyme :</p> 
                        <p>Mot de passe : </p>
                    </div> 
                    <div class='form_div'>
                        <p><input type="text" name="username" /></p>
                        <p><input type="password" name="password" /></p>
                    </div>
                    <p class='form_div2'>
                        <input type="checkbox" name="question" id='question'/><label for="question">J'ai oublié mon mot de passe.</label>
                    </p>
                    <p class='form_div2'>
                        <input id='valider' type="submit" value="Valider" />
                    </p>
                </div>
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