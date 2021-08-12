<?php include('config/header.php'); ?>
    <section>
        <div class='separateur'></div>
        <?php
        if(isset($_GET['update']))
        {
            if($_GET['update'] == 'true')
            {
                ?>
                <p id="error_message">Vos paramètres ont été enregistrés!</p>
                <?php
            }
        }
        ?>
        <p>Vous pouvez changer ci-dessous vos paramètres personnels :</br></p>
        <form method="post" action="settingsredirect.php">
            <div id="form">
                <div class='form_div'>
                    <p class="categorie">Nom :</p>
                    <p><input type="text" name="nom" placeholder="<?=$user['nom']?>" /></p>
                </div>  
                <div class='form_div'>
                    <p class="categorie">Prénom : </p>
                    <p><input type="text" name="prenom" placeholder="<?=$user['prenom']?>" /></p>
                </div>  
                <div class='form_div'>
                    <p class="categorie">Mot de passe : </p>
                    <p><input type="password" name="password" placeholder="<?=$user['password']?>" /></p>
                </div>  
                <div class='form_div'>
                    <p class="categorie">Question de sécurité : </p>
                    <p><input type="text" name="question" placeholder="<?=$user['question']?>" /></p>
                </div>  
                <div class='form_div'>
                    <p class="categorie">Réponse : </p>
                    <p><input type="text" name="reponse" placeholder="<?=$user['reponse']?>" /></p>
                </div>
                <input type="hidden" name="username" value=<?php echo $_COOKIE['username'] ?> />
                <input id='valider' type="submit" value="Valider" class='form_div2'/>
            </div>
        </form>
        
    </section>
    <?php include('config/footer.php'); ?>
</body>
</html>