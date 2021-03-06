<?php include('template/header.php'); ?>
    <section>
        <div class='separateur'></div>
        <?php
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
            <form method="post" action="redirect/loginredirect.php">
                <div id="form">
                    <div class='form_div'>
                        <label for="username" class="categorie">Pseudonyme</label>
                        <input id="username" type="text" name="username" />
                    </div>  
                    <div class='form_div'>
                        <label for="password" class="categorie">Mot de passe</label>
                        <input id="password" type="password" name="password" />
                    </div>
                    <div>
                        <input type="checkbox" name="question" id='question_box' class='form_div2'/>
                        <label for="question_box">J'ai oublié mon mot de passe.</label>
                    </div>
                    <input id='valider' type="submit" value="Valider" class='form_div2'/>
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
    <?php include('template/footer.php'); ?>
</body>
</html>