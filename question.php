<?php include('template/header.php'); ?>
    <section>
        <div class='separateur'></div>
        <?php
        if (isset($_GET['username']))
        {
            $user = loadUser($_GET['username']);
            if(!isset($user['username']))
            {
                header('location: login.php?login=wronguser');
            }
            elseif(isset($_GET['response']))
            {
                if($_GET['response'] == 'wrong')
                {
                    ?>
                    <p id="error_message">Votre réponse est incorrecte.</p>
                    <?php
                }

            }

            ?>
            <p>Pour vous connecter à nouveau, vous devez réinitialiser votre mot de passe en répondant à votre question secrète.</p>
            <form method="post" action="redirect/questionredirect.php">
                <div id="form">
                    <div class='form_div'>
                        <p class="categorie">Votre question</p> 
                        <p class="categorie2"> <?=$user['question']?></p>
                   </div>
                    <div class='form_div'>
                        <label class="categorie">Votre réponse</label>
                        <input class="categorie2" type="text" name="response" />
                    </div>
                    <input type="hidden" name='username' value="<?=$_GET['username']?>">
                    <p class='form_div2'>
                        <input id='valider' type="submit" value="Valider" />
                    </p>
                </div>
            </form>
            <?php
            
        }
        else
        {
            header('location: login.php?login=wronguser');
        }
        ?>
    </section>
    <?php include('template/footer.php'); ?>
</body>
</html>