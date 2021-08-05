<?php include('config/header.php'); ?>
    <section>
        <?php
        
        include('config/functions.php');

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
                    <p>Votre réponse est incorrecte.</p>
                    <?php
                }

            }

            ?>
            <form method="post" action="questionredirect.php">
                <p>
                    Votre question : <?=$user['question']?><br>
                    Votre réponse : <input type="text" name="response" /><br>
                    <input type="hidden" name='username' value="<?=$_GET['username']?>">
                    <input type="submit" value="Valider" />
                </p>
            </form>
            <?php
            
        }
        else
        {
            header('location: login.php?login=wronguser');
        }
        ?>
    </section>
    <?php include('config/footer.php'); ?>
</body>
</html>