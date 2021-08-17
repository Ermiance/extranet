<?php include('template/header.php'); ?>
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
            <form method="post" action="redirect/pwresetredirect.php">
                <div id="form">
                    <div class='form_div'>
                        <label for="password" class="categorie">Votre nouveau mot de passe</label> 
                        <input id="password" class="categorie2" type="password" name="password" placeholder="<?=str_repeat('*', strlen($user['password']))?>" />
                   </div>
                    <div class='form_div'>
                        <label for="passwordconfirm" class="categorie">Confirmation du mot de passe </label>
                        <input id="passwordconfirm" class="categorie2" type="password" name="passwordconfirm" placeholder="<?=str_repeat('*', strlen($user['password']))?>" />
                    </div>
                    <input type="hidden" name='username' value="<?=$user['username']?>">
                    <div class='form_div2'>
                        <input id='valider' type="submit" value="Valider" />
                    </div>
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
    <?php include('template/footer.php'); ?>
</body>
</html>