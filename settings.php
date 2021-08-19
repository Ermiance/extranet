<?php include('template/header.php'); ?>
    <section>
        <div class='separateur'></div>
        <?php
        if(isset($_GET['update']))
        {
            ?>
            <p id="error_message">Vos paramètres ont été enregistrés !</p>
            <?php
        }
        elseif(isset($_GET['samepw']))
        {
            ?>
            <p id="error_message">Veuillez confirmer le mot de passe.</p>
            <?php
        }
        ?>
        <h4>Vous pouvez changer ci-dessous vos paramètres personnels :</h4>
        <form method="post" action="redirect/settingsredirect.php">
            <div id="form">
                <div class='form_div'>
                    <label for="nom" class="categorie">Nom</label>
                    <input id="nom" type="text" name="nom" placeholder="<?=$user['nom']?>" />
                </div>  
                <div class='form_div'>
                    <label for="prenom" class="categorie">Prénom</label>
                    <input id="prenom" type="text" name="prenom" placeholder="<?=$user['prenom']?>" />
                </div>  
                <div class='form_div'>
                    <label for="password" class="categorie">Mot de passe</label>
                    <input id="password" type="password" name="password" placeholder="<?=str_repeat('*', strlen($user['password']))?>" />
                </div>
                <div class='form_div'>
                    <label for="passwordconfirm" class="categorie">Confirmez le mot de passe</label>
                    <input id="passwordconfirm" type="password" name="passwordconfirm" placeholder="<?=str_repeat('*', strlen($user['password']))?>" />
                </div>  
                <div class='form_div'>
                    <label for="question" class="categorie">Question de sécurité</label>
                    <textarea id="question" name="question" rows='3' placeholder="<?=$user['question']?>"></textarea>
                </div>  
                <div class='form_div'>
                    <label for="reponse" class="categorie">Réponse</label>
                    <input id= "reponse" type="text" name="reponse" placeholder="<?=$user['reponse']?>" />
                </div>
                <input type="hidden" name="username" value=<?=$_COOKIE['username'] ?> />
                <input id='valider' type="submit" value="Valider" class='form_div2'/>
            </div>
        </form>
        
    </section>
    <?php include('template/footer.php'); ?>
</body>
</html>