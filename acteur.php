
<?php 
include('config/header.php'); 
include('config/functions.php');
?>
<?php
if(isset($_GET['acteur']))
{
    $acteur = loadActeur(urldecode($_GET['acteur']));
    $commentaires = loadPost($acteur['id_acteur']);
    $vote = loadVote($acteur['id_acteur']);
    ?>
    <section id='presentation'>
        <img src="<?= $acteur['logo'] ?>" alt="Logo de l'acteur">
        <h2><?=$acteur['acteur']?></h2>
        <p><?=$acteur['description']?></p>
    </section>
    <section id='commentaires'>
        <div id='comheader'>
            <p><?=countPost($commentaires)?> commentaires</p>
            <p>Nouveau commentaire</p>
            <div>
                <p><?=countVote($vote)?></p>
                <a href=""><img src="img/like.png" alt="Like" width=30px></a>
                <a href=""><img src="img/dislike.png" alt="Dislike" width=30px></a>
            </div>
        </div>
        <div id='listecommentaires'>
        <?php 
        $commentaires = loadPost($acteur['id_acteur']);
        while($com = $commentaires->fetch()){
            ?>
            <div>
                <p>Prénom: <?=userPrenom($com['id_user'])?></p>
                <p>Date: <?=$com['date_add']?></p>
                <p><?=$com['post']?></p>
            </div>
        <?php
        }

        
        ?>
        </div>
    </section>
    <?php
}
else
{
    header('Location: index.php');
}
?>
<?php include('config/footer.php'); ?>
</body>
</html>