<?php 
include('config/functions.php');


if (!isset($_COOKIE["username"]))
{
    setcookie('username', null, time() + 24*3600, null, null, false, true); 
}

include('config/header.php'); ?>
    <section id="presentation">
        <h1>Extranet GBAF</h1>
        <p>Bienvenue sur l'extranet du GBAF</p>
        <img id="illustration" src="illustration.jpg" alt="Illustration GBAF">
    </section>
    <section id="acteurs">
        <h2>Acteurs et partenaires</h2>
        <p>Voici une présentation de tous les acteurs travaillant avec la GBAF.</p>
        <div id="liste_acteurs">
            <?php
            $req = connectBdd()->prepare("SELECT logo, acteur, description FROM acteur");

            $req->execute();
              
            while ($acteur = $req->fetch())
            {
                ?>
                <div class="bloc_acteur">
                    <?= urlencode($acteur['acteur']); ?>
                    <a href="acteur.php?acteur=<?=urlencode($acteur['acteur']) ?>">
                    <img class="logo_acteur" src="<?= $acteur['logo'] ?>" width="100" height ="100" 
                    attr="<?= $acteur['logo']?>" alt=""></a>
                    <div class="bloc2">
                        <h3><?= $acteur['acteur'] ?></h3>
                        <p><?= $acteur['description'] ?></p>
                        <p class="suite">Lire la suite</p>
                    </div>
                </div>
                <?php                
            }
            $req->closeCursor();
            ?>
        </div>
    </section>
    <?php include('config/footer.php'); ?>
</body>
</html>