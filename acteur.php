
<?php 
include('config/header.php'); 
include('config/functions.php');
?>
<?php
if(isset($_GET['acteur']) && isset($_COOKIE['username']))
{
    try
    {
        $acteur = loadActeur(urldecode($_GET['acteur']));
    }

    catch (exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    } 
    ?>
    <section id='presentation'>
        <img src="<?= $acteur['logo'] ?>" alt="Logo de l'acteur">
        <h2><?=$acteur['acteur']?></h2>
        <p><?=$acteur['description']?></p>
    </section>
    <section id='commentaires'>
        <div id='comheader'>
            <p><?=countPost($acteur['id_acteur'])['nb_com']?> commentaires</p>
            <p>Nouveau commentaire</p>
            <div>
                <p><?=countVote($acteur['id_acteur'])['sum_likes']?></p>
                <?php 
                $id_user = loadUser($_COOKIE['username'])['id_user'];
                $user_vote = loadVote($id_user, $acteur['id_acteur']);
                if($user_vote){
                    if($user_vote['vote'] < 1){
                        ?>
                        <a href="likeredirect.php?acteur=<?= urlencode($acteur['acteur']) ?>&vote=like">
                        <img src="img/like.png" alt="Like" width=30px></a>
                        <?php
                    }
                    else {
                        ?>
                        <a href="likeredirect.php?acteur=<?= urlencode($acteur['acteur']) ?>&vote=unlike">
                        <img src="img/likevalidated.png" alt="Like" width=30px></a>
                        <?php
                    }
                    if($user_vote['vote'] > -1){
                        ?>
                        <a href="likeredirect.php?acteur=<?= urlencode($acteur['acteur']) ?>&vote=dislike">
                        <img src="img/dislike.png" alt="Dislike" width=30px></a>
                        <?php
                    }
                    else {
                        ?>
                        <a href="likeredirect.php?acteur=<?= urlencode($acteur['acteur']) ?>&vote=undislike">
                        <img src="img/dislikevalidated.png" alt="Dislike" width=30px></a>
                        <?php
                    }
                }
                else{
                    ?>
                    <a href="likeredirect.php?acteur=<?= urlencode($acteur['acteur']) ?>&vote=like&action=create">
                    <img src="img/like.png" alt="Like" width=30px></a>
                    <a href="likeredirect.php?acteur=<?= urlencode($acteur['acteur']) ?>&vote=dislike&action=create">
                    <img src="img/dislike.png" alt="Dislike" width=30px></a>
                    <?php
                }
                ?>
            </div>
        </div>
        <div id='listecommentaires'>
        <?php 
        $commentaires = loadPost($acteur['id_acteur']);
        while($com = $commentaires->fetch()){
            ?>
            <div>
                <p>Commentaire de: <?=userPrenom($com['id_user'])?></p>
                <p>Date: <?=$com['date_add']?></p>
                <p><?=$com['post']?></p>
            </div>
        <?php
        }
        ?>
        </div>
        <div id='nouveaucom'>
            <form method='post' action='acteurredirect.php'>
                <p>Nouveau commentaire : <br>
                <input type="text" name='post'><br>
                <input type="hidden" name='id_user' value='<?=$id_user?>'>
                <input type="hidden" name='id_acteur' value='<?=$acteur['id_acteur']?>'>
                <input type="hidden" name='acteur' value="<?=urlencode($acteur['acteur'])?>">
                <input type="submit" value='valider'>
                </p>
            </form>
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