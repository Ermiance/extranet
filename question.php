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
                    <p id="error_message">Votre réponse est incorrecte.</p>
                    <?php
                }

            }

            ?>
            <form method="post" action="questionredirect.php">
                <div id="form">
                    <div class='form_div'>
                        <p>Votre question :</p> 
                        <p>Votre réponse : </p>
                   </div>
                <div class='form_div'>
                    <p> <?=$user['question']?></p>
                    <p><input type="text" name="response" /></p>
                </div>
                <input type="hidden" name='username' value="<?=$_GET['username']?>">
                <p class='form_div2'>
                    <input id='valider' type="submit" value="Valider" />
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