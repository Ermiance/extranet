<?php 
if (!isset($_COOKIE["username"]))
{
    header('Location: login.php'); 
}

include('template/header.php'); ?>
<body>
    <section id="presentation">
        <div class='separateur'></div>
        <h1>Bienvenue sur l'extranet du GBAF</h1>
        <p>Le Groupement Banque Assurance Français​ (GBAF) est une fédération
        représentant les 6 grands groupes français :</p>
        <ul>
            <li>BNP Paribas ;</li>
            <li>BPCE ;</li>
            <li>Crédit Agricole ;</li>
            <li>Crédit Mutuel-CIC ;</li>
            <li>Société Générale ;</li>
            <li>La Banque Postale</li></ul>
        <p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
les axes de la réglementation financière française. Sa mission est de promouvoir
l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
pouvoirs publics.</p>
        <img id="illustration" src="img/illustration.jpg" alt="Illustration GBAF"> 
    </section>
    <section id="acteurs">
        <div class='separateur'></div>
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
                    <a class="logo_acteur"  href="acteur.php?acteur=<?=urlencode($acteur['acteur']) ?>">
                    <img src="<?= $acteur['logo'] ?>" width="190" height ="100" alt=""></a>
                    <h3><a href="acteur.php?acteur=<?=urlencode($acteur['acteur']) ?>"><?= $acteur['acteur'] ?></a></h3>
                    <p class='texte_acteur'><?= $acteur['description'] ?></p>
                    <a class="suite" href="acteur.php?acteur=<?=urlencode($acteur['acteur']) ?>">Lire la suite</a>
                </div>
                <?php                
            }
            $req->closeCursor();
            ?>
        </div>
    </section>
    <?php include('template/footer.php'); ?>
</body>
</html>