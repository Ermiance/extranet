<?php include('config/header.php'); ?>
    <section>
        <div class='separateur'></div>
        <?php
        if(isset($_GET['error']))
        {
            if($_GET['error'] == 'empty')
            {
                ?>
                <p id="error_message">Vous devez remplir tous les champs.</p>
                <?php
            }
            elseif($_GET['error'] == 'confirm')
            {
                ?>
                <p id="error_message">Entrez deux fois le même mot de passe.</p>
                <?php
            }
            elseif($_GET['error'] == 'same')
            {
                ?>
                <p id="error_message">Votre mot de passe doit être différent du précédent.</p>
                <?php
            }
        }
        if (isset($_COOKIE['userreset']))
        {
            $user = loadUser($_COOKIE['userreset']);
            if(!isset($user['username']))
            {
                header('location: login.php?login=wronguser');
            }
            ?>
            <form method="post" action="pwresetredirect.php">
                <div id="form">
                    <div class='form_div'>
                        <p class="categorie">Votre nouveau mot de passe :</p> 
                        <p class="categorie2"><input type="password" name="password" placeholder="******" /></p>
                   </div>
                    <div class='form_div'>
                        <p class="categorie">Confirmation du mot de passe : </p>
                        <p class="categorie2"><input type="password" name="passwordconfirm" placeholder="******" /></p>
                    </div>
                    <input type="hidden" name='username' value="<?=$user['username']?>">
                    <p class='form_div2'>
                        <input id='valider' type="submit" value="Valider" />
                    </p>
                </div>
            </form>
            <?php
            
        }
        else
        {
            header('location: login.php');
        }
        ?>
    </section>
    <?php include('config/footer.php'); ?>
</body>
</html>