<?php include('config/header.php'); ?>
    <section>
        <?php 
        if (isset($_POST["username"]))
        {
            
            
            if (loadUser($_POST["username"]))
            {
                ?>
                <p>
                    Il y a déjà un utilisateur à ce nom.
                </p>
                <?php
            }
            else
            {
                addUser(ucfirst($_POST['nom']), ucfirst($_POST['prenom']), $_POST['username'], $_POST['password'], $_POST['question'], $_POST['reponse']);
                setcookie('username', $_POST['username'], time() + 24*3600, null, null, false, true);
                header('Location: index.php');
            }
            
            
            
            //$req->closeCursor();
        }   
        else
        {
        ?>
        <p>
            Redirection vers la page d'enregistrement...
        </p>
        <?php 
        header('Location: index.php');
        }
        ?>
    </section>
    <?php include('config/footer.php'); ?>
</body>
</html>