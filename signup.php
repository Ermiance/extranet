<?php include('template/header.php'); ?>
    <section>
        <div class='separateur'></div>
        <?php
        if(isset($_GET['empty']))
        {
            ?>
            <p id="error_message">Veuillez remplir tous les champs.</p>
            <?php
        }
        elseif(isset($_GET['exist']))
        {
            ?>
            <p id="error_message">Ce nom d'utilisateur existe déjà.</p>
            <?php
        }
        elseif(isset($_GET['samepw']))
        {
            ?>
            <p id="error_message">Veuillez confirmer votre mot de passe.</p>
            <?php
        }
        else
        {
            ?>
            <p>Veuillez renseigner ces informations pour créer un nouveau profil.</p>
            <?php
        }
        ?>
        <form method="post" action="redirect/signupredirect.php">
            <div id="form">
                <div class='form_div'>
                    <label for="nom" class="categorie">Nom</label>
                    <input type="text" name="nom" />
                </div>  
                <div class='form_div'>
                    <label for="prenom" class="categorie">Prénom</label>
                    <input type="text" name="prenom" />
                </div> 
                <div class='form_div'>
                    <label for="username" class="categorie">Nom d'utilisateur</label>
                    <input type="text" name="username" />
                </div>  
                <div class='form_div'>
                    <label for="password" class="categorie">Mot de passe</label>
                    <input type="password" name="password" />
                </div>  
                <div class='form_div'>
                    <label for="passwordconfirm" class="categorie">Confirmez le mot de passe</label>
                    <input type="password" name="passwordconfirm" />
                </div>  
                <div class='form_div'>
                    <label for="question" class="categorie">Question de sécurité</label>
                    <textarea type="textarea" name="question" rows="5"></textarea>
                </div>  
                <div class='form_div'>
                    <label for="reponse" class="categorie">Réponse</label>
                    <input type="text" name="reponse" />
                </div>
                <input id='valider' type="submit" value="Valider" class='form_div2'/>
            </div>
        </form>
    </section>
    <?php include('template/footer.php'); ?>
</body>
</html>